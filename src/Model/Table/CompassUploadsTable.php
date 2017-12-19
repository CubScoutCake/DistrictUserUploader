<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompassUploads Model
 *
 * @property \App\Model\Table\FileUploadsTable|\Cake\ORM\Association\BelongsTo $FileUploads
 *
 * @method \App\Model\Entity\CompassUpload get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompassUpload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompassUpload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompassUpload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompassUpload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompassUpload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompassUpload findOrCreate($search, callable $callback = null, $options = [])
 */
class CompassUploadsTable extends Table
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

        $this->setTable('compass_uploads');
        $this->setDisplayField('membership_number');
        $this->setPrimaryKey('id');

        $this->addBehavior('CakePHPCSV.Csv', [
            'length' => 0,
            'delimiter' => ',',
            'enclosure' => '"',
            'escape' => '\\',
            // Generates a Model.field headings row from the csv file
            'headers' => true,
            // If true, String $content is the data, not a path to the file
            'text' => false,
        ]);

        $this->belongsTo('FileUploads', [
            'foreignKey' => 'file_upload_id',
            'joinType' => 'INNER'
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
            ->notEmpty('membership_number');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmpty('title');

        $validator
            ->scalar('forenames')
            ->maxLength('forenames', 255)
            ->allowEmpty('forenames');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 255)
            ->allowEmpty('surname');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmpty('address');

        $validator
            ->scalar('address_line1')
            ->maxLength('address_line1', 255)
            ->allowEmpty('address_line1');

        $validator
            ->scalar('address_line2')
            ->maxLength('address_line2', 255)
            ->allowEmpty('address_line2');

        $validator
            ->scalar('address_line3')
            ->maxLength('address_line3', 255)
            ->allowEmpty('address_line3');

        $validator
            ->scalar('address_town')
            ->maxLength('address_town', 255)
            ->allowEmpty('address_town');

        $validator
            ->scalar('address_county')
            ->maxLength('address_county', 255)
            ->allowEmpty('address_county');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 255)
            ->allowEmpty('postcode');

        $validator
            ->scalar('address_country')
            ->maxLength('address_country', 255)
            ->allowEmpty('address_country');

        $validator
            ->scalar('role')
            ->maxLength('role', 255)
            ->allowEmpty('role');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->allowEmpty('location');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmpty('phone');

        $validator
            ->email('email')
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['membership_number', 'file_upload_id']));
        $rules->add($rules->existsIn(['file_upload_id'], 'FileUploads'));

        return $rules;
    }
}
