<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Josegonzalez\Upload\Validation\UploadValidation;

/**
 * FileUploads Model
 *
 * @property \App\Model\Table\AuthUsersTable|\Cake\ORM\Association\BelongsTo $AuthUsers
 * @property \App\Model\Table\CompassUploadsTable|\Cake\ORM\Association\HasMany $CompassUploads
 *
 * @method \App\Model\Entity\FileUpload get($primaryKey, $options = [])
 * @method \App\Model\Entity\FileUpload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FileUpload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FileUpload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FileUpload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FileUpload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FileUpload findOrCreate($search, callable $callback = null, $options = [])
 */
class FileUploadsTable extends Table
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

        $this->setTable('file_uploads');
        $this->setDisplayField('file_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('AuthUsers', [
            'foreignKey' => 'auth_user_id'
        ]);
        $this->hasMany('CompassUploads', [
            'foreignKey' => 'file_upload_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
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
//	    $validator->setProvider('upload', UploadValidation::class);

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('file_name')
            ->maxLength('file_name', 255)
            ->requirePresence('file_name', 'create')
            ->allowEmpty('file_name');

        $validator
            ->scalar('file_path')
            ->maxLength('file_path', 255)
            ->requirePresence('file_path', 'create')
            ->allowEmpty('file_path');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

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

        return $rules;
    }
}
