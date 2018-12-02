<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JoinStatuses Model
 *
 * @property \App\Model\Table\JoinRequestsTable|\Cake\ORM\Association\HasMany $JoinRequests
 * @property |\Cake\ORM\Association\HasMany $JoinRequestsSections
 *
 * @method \App\Model\Entity\JoinStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\JoinStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JoinStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JoinStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JoinStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JoinStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JoinStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class JoinStatusesTable extends Table
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

        $this->setTable('join_statuses');
        $this->setDisplayField('join_status');
        $this->setPrimaryKey('id');

        $this->hasMany('JoinRequests', [
            'foreignKey' => 'join_status_id'
        ]);
        $this->hasMany('JoinRequestsSections', [
            'foreignKey' => 'join_status_id'
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
            ->scalar('join_status')
            ->maxLength('join_status', 255)
            ->requirePresence('join_status', 'create')
            ->notEmpty('join_status');

        $validator
            ->integer('status_type')
            ->requirePresence('status_type', 'create')
            ->notEmpty('status_type');

        return $validator;
    }
}
