<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Audits Model
 *
 * @property \App\Model\Table\AuthUsersTable|\Cake\ORM\Association\BelongsTo $AuthUsers
 * @property \App\Model\Table\ContactsTable|\Cake\ORM\Association\BelongsTo $Contacts
 *
 * @method \App\Model\Entity\Audit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Audit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Audit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Audit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Audit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Audit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Audit findOrCreate($search, callable $callback = null, $options = [])
 */
class AuditsTable extends Table
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

        $this->setTable('audits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'change_date' => 'always'
                ]
            ]
        ]);

        $this->addBehavior('Muffin/Footprint.Footprint', [
            'events' => [
                'Model.beforeSave' => [
                    'auth_user_id' => 'always',
                ]
            ],
            'propertiesMap' => [
                'auth_user_id' => '_footprint.id',
            ],
        ]);

        $this->belongsTo('AuthUsers', [
            'foreignKey' => 'auth_user_id'
        ]);

        $this->belongsTo('Contacts', [
            'foreignKey' => 'contact_id'
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
            ->scalar('audit_field')
            ->maxLength('audit_field', 255)
            ->requirePresence('audit_field', 'create')
            ->notEmpty('audit_field');

        $validator
            ->integer('contact_id')
            ->requirePresence('contact_id', 'create')
            ->notEmpty('contact_id');

        $validator
            ->integer('auth_user_id')
            ->requirePresence('auth_user_id', false)
            ->allowEmpty('auth_user_id');

        $validator
            ->scalar('original_value')
            ->maxLength('original_value', 255)
            ->requirePresence('original_value', 'create')
            ->allowEmpty('original_value');

        $validator
            ->scalar('modified_value')
            ->maxLength('modified_value', 255)
            ->requirePresence('modified_value', 'create')
            ->notEmpty('modified_value');

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
        $rules->add($rules->existsIn(['auth_user_id'], 'AuthUsers'));
        $rules->add($rules->existsIn(['contact_id'], 'Contacts'));

        return $rules;
    }

    /**
     * before Save LifeCycle Callback
     *
     * @param \Cake\Event\Event $event The Event to be Processed
     * @param \App\Model\Entity\Audit $entity The Entity on which the Save is being Called.
     * @param array $options Options Values
     *
     * @return void
     */
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->auth_user_id == 0) {
            $entity->auth_user_id = null;
        }
    }
}
