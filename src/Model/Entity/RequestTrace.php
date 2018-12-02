<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RequestTrace Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime $resolved_date
 * @property string $contact_hash
 * @property string $resolver
 * @property string $trace_type
 */
class RequestTrace extends Entity
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
        'created_date' => true,
        'resolved_date' => true,
        'contact_hash' => true,
        'resolver' => true,
        'trace_type' => true
    ];
}
