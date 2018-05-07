<?php
namespace App\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Search\Model\Behavior\SearchBehavior;

/**
 * Contacts Model
 *
 * @property \App\Model\Table\WpRolesTable|\Cake\ORM\Association\BelongsTo $WpRoles
 * @property \App\Model\Table\ScoutGroupsTable|\Cake\ORM\Association\BelongsTo $AdminGroups
 * @property \App\Model\Table\RoleTypesTable|\Cake\ORM\Association\BelongsToMany $RoleTypes
 * @property \App\Model\Table\SectionsTable|\Cake\ORM\Association\BelongsToMany $Sections
 * @property \App\Model\Table\AuditsTable|\Cake\ORM\Association\HasMany $Audits
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
 * @mixin \Search\Model\Behavior\SearchBehavior
 *
 * @property $this->behaviours()->Search SearchBehaviour
 */
class ContactsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     *
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contacts');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'modified' => 'always'
                ],
            ]
        ]);
        $this->addBehavior('Search.Search');

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

        $this->hasMany('Roles', [
            'foreignKey' => 'contact_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);

        $this->belongsToMany('RoleTypes', [
            'through' => 'Roles',
        ]);

        $this->belongsToMany('Sections', [
            'through' => 'Roles',
        ]);

        $this->hasMany('Audits', [
            'foreignKey' => 'contact_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     *
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
            ->add('membership_number', 'unique', [ 'rule' => 'validateUnique', 'provider' => 'table' ]);

        $validator
            ->integer('wp_id')
            ->allowEmpty('wp_id')
            ->add('wp_id', 'unique', [ 'rule' => 'validateUnique', 'provider' => 'table' ]);

        $validator
            ->integer('mc_id')
            ->allowEmpty('mc_id')
            ->add('mc_id', 'unique', [ 'rule' => 'validateUnique', 'provider' => 'table' ]);

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
            ->add('email', 'unique', [ 'rule' => 'validateUnique', 'provider' => 'table' ]);

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

        $validator
            ->scalar('preferred_name')
            ->allowEmpty('preferred_name')
            ->maxLength('preferred_name', 255);

        $validator
            ->boolean('validated')
            ->allowEmpty('validated');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     *
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique([ 'email' ]));
        $rules->add($rules->isUnique([ 'membership_number' ]));
        $rules->add($rules->isUnique([ 'wp_id' ]));
        $rules->add($rules->isUnique([ 'mc_id' ]));
        $rules->add($rules->existsIn([ 'wp_role_id' ], 'WpRoles'));
        $rules->add($rules->existsIn([ 'admin_group' ], 'AdminGroups'));

        return $rules;
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

        $dirty = $entity->getDirty();

        $entity->email = strtolower($entity->email);
        $entity->setDirty('email', false);

        $entity->first_name = ucwords(strtolower($entity->first_name));
        $entity->setDirty('first_name', false);
        $entity->last_name = ucwords(strtolower($entity->last_name));
        $entity->setDirty('last_name', false);

        $entity->address_line_1 = ucwords(strtolower($entity->address_line_1));
        $entity->setDirty('address_line_1', false);
        $entity->address_line_2 = ucwords(strtolower($entity->address_line_2));
        $entity->setDirty('address_line_2', false);
        $entity->city = ucwords(strtolower($entity->city));
        $entity->setDirty('city', false);
        $entity->county = ucwords(strtolower($entity->county));
        $entity->setDirty('county', false);
        $entity->postcode = strtoupper($entity->postcode);
        $entity->setDirty('postcode', false);

        foreach ($dirty as $dirt) {
            $entity->setDirty($dirt, true);
        }

        return true;
    }

    /**
     * @param \Cake\ORM\Query $query The Query to be Modified
     *
     * @return mixed
     */
    public function findNew($query)
    {
        $query
            ->where([ 'wp_id IS' => null ])
            ->where([ 'validated' => true ]);

        return $query;
    }

    /**
     * @param array $ContactArray The Contact Data to be Merged
     *
     * @return \App\Model\Entity\Contact|bool
     */
    public function findOrMakeContact(array $ContactArray)
    {
        if (!isset($ContactArray['membership_number'])
            || !isset($ContactArray['email'])
            || !isset($ContactArray['first_name'])
            || !isset($ContactArray['last_name'])
        ) {
            return false;
        }

        $contactQuery = $this
        ->query()
        ->where([
            'OR' => [
                'membership_number' => $ContactArray['membership_number'],
                [
                    'email' => $ContactArray['email'],
                    'first_name' => $ContactArray['first_name'],
                    'last_name' => $ContactArray['last_name'],
                ]
            ]
        ]);

        $row = $contactQuery->first();

        if ($row == null) {
            $row = $this->newEntity();
        }

        $contact = $row;

        $contact = $this->patchEntity($contact, [
            'email' => $ContactArray['email'],
            'first_name' => $ContactArray['first_name'],
            'last_name' => $ContactArray['last_name'],
            'membership_number' => $ContactArray['membership_number'],
            'address_line_1' => $ContactArray['address_line1'],
            'address_line_2' => $ContactArray['address_line2'],
            'city' => $ContactArray['address_town'],
            'county' => $ContactArray['address_county'],
            'postcode' => $ContactArray['postcode']
        ]);

        if (empty($contact->wp_role_id)) {
            $wpRoles = TableRegistry::get('WpRoles');
            $leaderRole = $wpRoles->findOrCreate(['wp_role' => 'Leader']);

            $id = $leaderRole->id;
            if (!is_numeric($id)) {
                $id = 1;
            }
            $contact = $contact->set('wp_role_id', $id);
        }

        $response = $this->save($contact);

        if ($response instanceof Entity) {
            return $response;
        }

        return false;
    }

    /**
     * AuditSave Method for Saving Changed Values
     *
     * @param Entity $entity The Entity to be Audit Saved.
     * @return Entity $entity The Entity being Saved.
     */
    public function auditSave(Entity $entity)
    {
        $audits = TableRegistry::get('Audits');

        $dirtyValues = $entity->getDirty();
        $contactId = $entity->id;

        foreach ($dirtyValues as $dValue) {
            $current = $entity->$dValue;
            $original = $entity->getOriginal($dValue);

            if ($entity->isNew()) {
                $original = null;
            }

            if ($current <> $original) {
                $auditData = [
                    'audit_field' => $dValue,
                    'contact_id' => $contactId,
                    'original_value' => $original,
                    'modified_value' => $current,
                ];

                $audit = $audits->newEntity($auditData);
                $audits->save($audit);
            }
        }

        return $entity;
    }

    /**
     * before Save LifeCycle Callback
     *
     * @param Event $event The Event to be Processed
     * @param Entity $entity The Entity on which the Save is being Called.
     * @param array $options Options Values
     *
     * @return void
     */
    public function beforeSave(Event $event, Entity $entity, $options)
    {
        $this->auditSave($entity);
    }

    /**
     * @return \Search\Manager
     * @uses \Search\Model\Behavior\SearchBehavior
     */
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->add('q_text', 'Search.Like', [
                'before' => true,
                'after' => true,
                'mode' => 'or',
                'comparison' => 'ILIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => [
                    'first_name',
                    'last_name',
                    'email',
                    'preferred_name',
                    'postcode',
                    'address_line_1',
                    'address_line_2',
                    'city',
                ],
                'filterEmpty' => true,
            ]);

        return $searchManager;
    }
}
