<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CompassUpload Entity
 *
 * @property int $id
 * @property int $file_upload_id
 * @property int $membership_number
 * @property string $title
 * @property string $forenames
 * @property string $surname
 * @property string $address
 * @property string $address_line1
 * @property string $address_line2
 * @property string $address_line3
 * @property string $address_town
 * @property string $address_county
 * @property string $postcode
 * @property string $address_country
 * @property string $role
 * @property string $location
 * @property string $phone
 * @property string $email
 *
 * @property \App\Model\Entity\FileUpload $file_upload
 */
class CompassUpload extends Entity
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
        'file_upload_id' => true,
        'membership_number' => true,
        'title' => true,
        'forenames' => true,
        'surname' => true,
        'address' => true,
        'address_line1' => true,
        'address_line2' => true,
        'address_line3' => true,
        'address_town' => true,
        'address_county' => true,
        'postcode' => true,
        'address_country' => true,
        'role' => true,
        'location' => true,
        'phone' => true,
        'email' => true,
        'file_upload' => true
    ];
}
