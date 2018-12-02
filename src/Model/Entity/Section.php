<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Section Entity
 *
 * @property int $id
 * @property string $section
 * @property int $section_type_id
 * @property int $scout_group_id
 * @property int $wp_section_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $section_order
 *
 * @property \App\Model\Entity\SectionType $section_type
 * @property \App\Model\Entity\ScoutGroup $scout_group
 */
class Section extends Entity
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
        'section' => true,
        'section_type_id' => true,
        'wp_section_id' => true,
        'created' => true,
        'modified' => true,
        'section_type' => true,
        'scout_group_id' => true,
        'scout_group' => true,
    ];
}
