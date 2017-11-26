<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WpRoles Model
 *
 * @property \App\Model\Table\ContactTable|\Cake\ORM\Association\HasMany $Contact
 *
 * @method \App\Model\Entity\WpRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\WpRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WpRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WpRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WpRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WpRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WpRole findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WpRolesTable extends Table
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

        $this->setTable('wp_roles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Contact', [
            'foreignKey' => 'wp_role_id'
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
            ->scalar('wp_role')
            ->maxLength('wp_role', 11)
            ->requirePresence('wp_role', 'create')
            ->notEmpty('wp_role')
            ->add('wp_role', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['wp_role']));

        return $rules;
    }
}
