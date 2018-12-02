<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JoinRequests Model
 *
 * @property \App\Model\Table\JoinStatusesTable|\Cake\ORM\Association\BelongsTo $JoinStatuses
 * @property \App\Model\Table\SectionsTable|\Cake\ORM\Association\BelongsToMany $Sections
 *
 * @method \App\Model\Entity\JoinRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\JoinRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JoinRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JoinRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JoinRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JoinRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JoinRequest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JoinRequestsTable extends Table
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

        $this->setTable('join_requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('JoinStatuses', [
            'foreignKey' => 'join_status_id',
            'joinType' => 'INNER',
            'conditions' => ['JoinStatuses.status_type' => 1],
        ]);
        $this->belongsToMany('Sections', [
            'foreignKey' => 'join_request_id',
            'targetForeignKey' => 'section_id',
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
            ->scalar('contact_email')
            ->maxLength('contact_email', 255)
            ->requirePresence('contact_email', 'create')
            ->notEmpty('contact_email');

        $validator
            ->scalar('contact_phone')
            ->maxLength('contact_phone', 255)
            ->allowEmpty('contact_phone');

        $validator
            ->boolean('young_person')
            ->notEmpty('young_person');

        $validator
            ->scalar('parent_first_name')
            ->maxLength('parent_first_name', 255)
            ->requirePresence('parent_first_name', 'create')
            ->notEmpty('parent_first_name');

        $validator
            ->scalar('parent_last_name')
            ->maxLength('parent_last_name', 255)
            ->requirePresence('parent_last_name', 'create')
            ->notEmpty('parent_last_name');

        $validator
            ->scalar('young_person_first_name')
            ->maxLength('young_person_first_name', 255)
            ->allowEmpty('young_person_first_name');

        $validator
            ->scalar('young_person_last_name')
            ->maxLength('young_person_last_name', 255)
            ->allowEmpty('young_person_last_name');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmpty('date_of_birth');

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
        $rules->add($rules->existsIn(['join_status_id'], 'JoinStatuses'));

        return $rules;
    }
}
