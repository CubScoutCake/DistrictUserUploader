<?php
namespace App\Model\Table;

use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * RoleTypes Model
 *
 * @property \App\Model\Table\SectionTypesTable|\Cake\ORM\Association\BelongsTo $SectionTypes
 * @property \App\Model\Table\ContactsTable|\Cake\ORM\Association\BelongsToMany $Contacts
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\HasMany $Roles
 *
 * @method \App\Model\Entity\RoleType get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoleType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RoleType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoleType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoleType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoleType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoleType findOrCreate($search, callable $callback = null, $options = [])
 */
class RoleTypesTable extends Table
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

        $this->setTable('role_types');
        $this->setDisplayField('role_type');
        $this->setPrimaryKey('id');

        $this->belongsTo('SectionTypes', [
            'foreignKey' => 'section_type_id'
        ]);
        $this->belongsToMany('Contacts', [
            'through' => 'Roles',
        ]);

        $this->hasMany('Roles', [
            'foreignKey' => 'role_type_id',
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
            ->scalar('role_type')
            ->maxLength('role_type', 255)
            ->requirePresence('role_type', 'create')
            ->notEmpty('role_type');

        $validator
            ->integer('wp_role_id')
            ->allowEmpty('wp_role_id');

        $validator
            ->scalar('role_abbreviation')
            ->maxLength('role_abbreviation', 32)
            ->requirePresence('role_abbreviation', false)
            ->allowEmpty('role_abbreviation');

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
        $rules->add($rules->existsIn(['section_type_id'], 'SectionTypes'));
        $rules->add($rules->isUnique(['section_type_id', 'role_type']));
        $rules->add($rules->isUnique(['section_type_id', 'role_abbreviation']));

        return $rules;
    }

    /**
     * @param array $roleArray an array containing Role & SectionType
     *
     * @return \Cake\ORM\Entity|bool
     */
    public function findOrMakeRoleType($roleArray)
    {
        if (!is_array($roleArray)) {
            return false;
        }

        if (!key_exists('role', $roleArray)
            && !key_exists('section_type', $roleArray)
            && !key_exists('section_type_id', $roleArray)
            ) {
            return false;
        }

        if (key_exists('section_type', $roleArray)) {
            $sectionType = $roleArray['section_type'];
            $sectionTypeId = $this->SectionTypes->findOrMakeSectionType($sectionType)->id;
        }

        if (key_exists('section_type_id', $roleArray)) {
            $sectionTypeId = $roleArray['section_type_id'];
            $sectionType = $this->SectionTypes->get($sectionTypeId);
        }

        if (!isset($sectionTypeId)) {
            return false;
        }

        $role = $roleArray['role'];

        $roleType = $this->findOrCreate([
            'role_type' => $role,
            'section_type_id' => $sectionTypeId,
        ]);

        if ($roleType instanceof Entity) {
            if (empty($roleType->role_abbreviation)) {
                $abbrev = $sectionType . ' ' . $role;
                if (preg_match_all('/\b(\w)/', strtoupper($abbrev), $exploded)) {
                    $abbrev = implode('', $exploded[1]); // $v is now SOQTU
                }

                $roleType->set('role_abbreviation', $abbrev);

                $this->save($roleType);
            }

            return $roleType;
        }

        return false;
    }
}
