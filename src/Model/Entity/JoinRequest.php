<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JoinRequest Entity
 *
 * @property int $id
 * @property int $join_status_id
 * @property string $contact_email
 * @property string $contact_phone
 * @property bool $young_person
 * @property string $parent_first_name
 * @property string $parent_last_name
 * @property string $young_person_first_name
 * @property string $young_person_last_name
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\JoinStatus $join_status
 * @property \App\Model\Entity\Section[] $sections
 */
class JoinRequest extends Entity
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
        'join_status_id' => true,
        'contact_email' => true,
        'contact_phone' => true,
        'young_person' => true,
        'parent_first_name' => true,
        'parent_last_name' => true,
        'young_person_first_name' => true,
        'young_person_last_name' => true,
        'date_of_birth' => true,
        'created' => true,
        'modified' => true,
        'join_status' => true,
        'sections' => true
    ];
}
