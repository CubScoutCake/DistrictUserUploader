<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property int $role_type_id
 * @property int $section_id
 * @property int $contact_id
 * @property int $wp_placement_id
 *
 * @property \App\Model\Entity\RoleType $role_type
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\Contact $contact
 */
class Role extends Entity
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
        'role_type_id' => true,
        'section_id' => true,
        'contact_id' => true,
        'wp_placement_id' => true,
        'role_type' => true,
        'section' => true,
        'contact' => true,
        'provisional' => true,
    ];
}
