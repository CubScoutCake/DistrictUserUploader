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
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Wp $wp
 * @property \App\Model\Entity\Mc $mc
 * @property \App\Model\Entity\WpRole $wp_role
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
        'wp' => true,
        'mc' => true,
        'wp_role' => true
    ];
}
