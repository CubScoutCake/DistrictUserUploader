<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity
 *
 * @property int $id
 * @property int $wp_id
 * @property int $mc_id
 * @property int $membership_number
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int $wp_role_id
 * @property int $admin_group_id
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $city
 * @property string $county
 * @property string $postcode
 * @property string $preferred_name
 * @property string $validated
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\WpRole $wp_role
 * @property \App\Model\Entity\ScoutGroup $admin_group
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\RoleType $role_type
 * @property \App\Model\Entity\Audit $audit
 */
class Contact extends Entity
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
        'wp_id' => true,
        'mc_id' => true,
        'membership_number' => true,
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'wp_role_id' => true,
        'created' => true,
        'modified' => true,
        'wp_role' => true,
        'address_line_1' => true,
        'address_line_2' => true,
        'city' => true,
        'county' => true,
        'postcode' => true,
        'admin_group' => true,
        'role_type' => true,
        'section' => true,
        'preferred_name' => true,
        'validated' => true,
        'audit' => true,
    ];

    /**
     * Full Name Virtual Field
     *
     * @return string
     */
    protected function _getFullName()
    {
        return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
    }

    protected $_virtual = ['full_name'];
}
