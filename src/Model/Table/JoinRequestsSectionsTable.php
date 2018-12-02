<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JoinRequestsSections Model
 *
 * @property \App\Model\Table\SectionsTable|\Cake\ORM\Association\BelongsTo $Sections
 * @property \App\Model\Table\JoinRequestsTable|\Cake\ORM\Association\BelongsTo $JoinRequests
 * @property |\Cake\ORM\Association\BelongsTo $JoinStatuses
 *
 * @method \App\Model\Entity\JoinRequestsSection get($primaryKey, $options = [])
 * @method \App\Model\Entity\JoinRequestsSection newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JoinRequestsSection[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JoinRequestsSection|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JoinRequestsSection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JoinRequestsSection[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JoinRequestsSection findOrCreate($search, callable $callback = null, $options = [])
 */
class JoinRequestsSectionsTable extends Table
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

        $this->setTable('join_requests_sections');
        $this->setDisplayField('section_id');
        $this->setPrimaryKey(['section_id', 'join_request_id']);

        $this->belongsTo('Sections', [
            'foreignKey' => 'section_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('JoinRequests', [
            'foreignKey' => 'join_request_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('JoinStatuses', [
            'foreignKey' => 'join_status_id',
            'joinType' => 'INNER',
            'conditions' => ['JoinStatuses.status_type' => 2],
        ]);
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
        $rules->add($rules->existsIn(['section_id'], 'Sections'));
        $rules->add($rules->existsIn(['join_request_id'], 'JoinRequests'));
        $rules->add($rules->existsIn(['join_status_id'], 'JoinStatuses'));

        return $rules;
    }
}
