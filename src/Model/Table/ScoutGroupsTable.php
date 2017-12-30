<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScoutGroups Model
 *
 * @property \App\Model\Table\SectionsTable|\Cake\ORM\Association\HasMany $Sections
 *
 * @method \App\Model\Entity\ScoutGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\ScoutGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ScoutGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ScoutGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ScoutGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ScoutGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ScoutGroup findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ScoutGroupsTable extends Table
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

        $this->setTable('scout_groups');
        $this->setDisplayField('group_alias');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always'
                ]
            ]
        ]);

        $this->hasMany('Sections', [
            'foreignKey' => 'scout_group_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
            ->scalar('scout_group')
            ->maxLength('scout_group', 255)
            ->requirePresence('scout_group', 'create')
            ->notEmpty('scout_group')
            ->add('scout_group', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('number_stripped')
            ->allowEmpty('number_stripped');

        $validator
            ->scalar('group_alias')
            ->maxLength('group_alias', 255)
            ->requirePresence('group_alias', false)
            ->allowEmpty('group_alias');

        $validator
            ->integer('wp_scout_group_id')
            ->allowEmpty('wp_scout_group_id');

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
        $rules->add($rules->isUnique(['scout_group']));
        $rules->add($rules->isUnique(['wp_scout_group_id']));
        $rules->add($rules->isUnique(['group_alias']));

        return $rules;
    }

    /**
     * Hashes the password before save
     *
     * @param \Cake\Event\Event $event The event trigger.
     * @return true
     */
    public function beforeSave($event)
    {
        $entity = $event->data['entity'];
        // Make a password for basic auth.
        preg_match('/[0-9]+/', $entity->scout_group, $strippedArray);

        if (key_exists(0, $strippedArray)) {
            $entity->number_stripped = $strippedArray[0];
        }

        if (empty($entity->group_alias)) {
            $entity->group_alias = $entity->scout_group;
        }

        return true;
    }
}
