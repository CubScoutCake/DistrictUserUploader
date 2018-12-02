<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestTraces Model
 *
 * @method \App\Model\Entity\RequestTrace get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestTrace newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestTrace[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestTrace|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestTrace patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestTrace[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestTrace findOrCreate($search, callable $callback = null, $options = [])
 */
class RequestTracesTable extends Table
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

        $this->setTable('request_traces');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->dateTime('created_date')
            ->requirePresence('created_date', 'create')
            ->notEmpty('created_date');

        $validator
            ->dateTime('resolved_date')
            ->requirePresence('resolved_date', 'create')
            ->notEmpty('resolved_date');

        $validator
            ->scalar('contact_hash')
            ->maxLength('contact_hash', 255)
            ->requirePresence('contact_hash', 'create')
            ->notEmpty('contact_hash');

        $validator
            ->scalar('resolver')
            ->maxLength('resolver', 255)
            ->allowEmpty('resolver');

        $validator
            ->scalar('trace_type')
            ->maxLength('trace_type', 255)
            ->requirePresence('trace_type', 'create')
            ->notEmpty('trace_type');

        return $validator;
    }
}
