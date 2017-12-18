<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FileUpload Entity
 *
 * @property int $id
 * @property string $file_name
 * @property string $file_path
 * @property int $auth_user_id
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 *
 * @property \App\Model\Entity\AuthUser $auth_user
 * @property \App\Model\Entity\CompassUpload[] $compass_uploads
 */
class FileUpload extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'file_name' => true,
        'file_path' => true,
        'auth_user_id' => true,
        'created_at' => true,
        'updated_at' => true,
        'auth_user' => true,
        'compass_uploads' => true
    ];
}
