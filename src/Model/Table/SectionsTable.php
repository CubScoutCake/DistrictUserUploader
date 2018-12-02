<?php
namespace App\Model\Table;

use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Sections Model
 *
 * @property \App\Model\Table\SectionTypesTable|\Cake\ORM\Association\BelongsTo $SectionTypes
 * @property \App\Model\Table\ContactsTable|\Cake\ORM\Association\BelongsToMany $Contacts
 * @property \App\Model\Table\ScoutGroupsTable|\Cake\ORM\Association\BelongsTo $ScoutGroups
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\HasMany $Roles
 *
 * @method \App\Model\Entity\Section get($primaryKey, $options = [])
 * @method \App\Model\Entity\Section newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Section[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Section|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Section patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Section[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Section findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SectionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sections');
        $this->setDisplayField('section');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always'
                ]
            ]
        ]);

        $this->belongsTo('SectionTypes', [
            'foreignKey' => 'section_type_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('ScoutGroups', [
            'foreignKey' => 'scout_group_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Contacts', [
            'through' => 'Roles',
        ]);

        $this->hasMany('Roles', [
            'foreignKey' => 'section_id',
        ]);

	    $this->belongsToMany('JoinRequests', [
		    'foreignKey' => 'section_id',
		    'targetForeignKey' => 'join_request_id',
		    'joinTable' => 'join_requests_sections'
	    ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('section')
            ->maxLength('section', 255)
            ->requirePresence('section', 'create')
            ->notEmpty('section');

        $validator
            ->integer('wp_section_id')
            ->allowEmpty('wp_section_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['section', 'scout_group_id']));
        $rules->add($rules->existsIn(['section_type_id'], 'SectionTypes'));
        $rules->add($rules->existsIn(['scout_group_id'], 'ScoutGroups'));

        return $rules;
    }

    /**
     * @param array $sectionArr Requires Group & Section Keys to Create
     *
     * @return \App\Model\Entity\Section|bool
     */
    public function findOrMakeSection(array $sectionArr)
    {
        if (isset($sectionArr['group']) && isset($sectionArr['section'])) {
            $group = $this->ScoutGroups->findOrCreate([ 'scout_group' => $sectionArr['group'] ], null, ['atomic' => false]);

            if ($group instanceof Entity) {
                $groupId = $group->id;
            }

            $typeId = $this->SectionTypes->matchTerms($sectionArr);

            if (isset($groupId) && isset($typeId)) {
                $section = $this->findOrCreate([
                    'section' => $sectionArr['section'],
                    'scout_group_id' => $groupId,
                    'section_type_id' => $typeId,
                ], null, ['atomic' => false]);

                if ($section instanceof Entity) {
                    return $section;
                }
            }
        }

        return false;
    }

    /**
     * Stores emails as lower case.
     *
     * @param \Cake\Event\Event $event The event being processed.
     *
     * @return bool
     */
    public function beforeRules($event)
    {
        $entity = $event->data['entity'];

        if ($entity->isNew()) {
            $section = $entity->section;
            if (strpos($section, 'Scout 1') !== false || $section == 'Group') {
                $scoutGroups = TableRegistry::get('ScoutGroups');
                $group = $scoutGroups->get($entity->scout_group_id);

                $shortGroupName = Text::truncate($group->scout_group, 15, [
                    'ellipsis' => false,
                    'exact' => false,
                    'html' => false,
                ]);
                $shortGroupName = ucwords(trim($shortGroupName));

                if ($section == 'Scout 1') {
                    $entity->section = $shortGroupName . ' - Scouts';
                } elseif ($section == 'Group') {
                    $entity->section = $shortGroupName . ' - Group';
                } else {
                    $section = ucwords(Inflector::pluralize(trim(str_replace('Scout 1', '', $section))));
                    $entity->section = $shortGroupName . ' - ' . $section;
                }
            }
        }

        return true;
    }
}
