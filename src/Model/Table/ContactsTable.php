<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contacts Model
 *
 * @property \App\Model\Table\WpRolesTable|\Cake\ORM\Association\BelongsTo $WpRoles
 *
 * @method \App\Model\Entity\Contact get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contact newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contact[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contact findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContactsTable extends Table
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

        $this->setTable('contacts');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('WpRoles', [
            'foreignKey' => 'wp_role_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('AdminGroups', [
            'className' => 'ScoutGroups',
            'foreignKey' => 'admin_group',
            'property' => 'scout_group',
            'propertyName' => 'admin_group',
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
            ->integer('membership_number')
            ->requirePresence('membership_number', 'create')
            ->notEmpty('membership_number')
            ->add('membership_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('wp_id')
            ->allowEmpty('wp_id')
            ->add('wp_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('mc_id')
            ->allowEmpty('mc_id')
            ->add('mc_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('address_line_1')
            ->allowEmpty('address_line_1')
            ->maxLength('address_line_1', 255);

        $validator
            ->scalar('address_line_2')
            ->allowEmpty('address_line_2')
            ->maxLength('address_line_2', 255);

        $validator
            ->scalar('city')
            ->allowEmpty('city')
            ->maxLength('city', 255);

        $validator
            ->scalar('county')
            ->allowEmpty('county')
            ->maxLength('county', 255);

        $validator
            ->scalar('postcode')
            ->allowEmpty('postcode')
            ->maxLength('postcode', 9);

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['membership_number']));
        $rules->add($rules->isUnique(['wp_id']));
        $rules->add($rules->isUnique(['mc_id']));
        $rules->add($rules->existsIn(['wp_role_id'], 'WpRoles'));
        $rules->add($rules->existsIn(['admin_group'], 'AdminGroups'));

        return $rules;
    }

    /**
     * Stores emails as lower case.
     *
     * @param \Cake\Event\Event $event The event being processed.
     * @return bool
     */
    public function beforeRules($event)
    {
        $entity = $event->data['entity'];

        $entity->email = strtolower($entity->email);
        $entity->first_name = ucwords(strtolower($entity->first_name));
        $entity->last_name = ucwords(strtolower($entity->last_name));

        $entity->address_line_1 = ucwords(strtolower($entity->address_line_1));
        $entity->address_line_2 = ucwords(strtolower($entity->address_line_2));
        $entity->city = ucwords(strtolower($entity->city));
        $entity->county = ucwords(strtolower($entity->county));
        $entity->postcode = strtoupper($entity->postcode);

        return true;
    }

    /**
     * @param Cake/Orm/Query $query The Query to be Modified
     *
     * @return mixed
     */
    public function findNew($query)
    {
        return $query->where(['wp_id IS' => null]);
    }
}
