<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JoinRequestsSection Entity
 *
 * @property int $section_id
 * @property int $join_request_id
 * @property int $join_status_id
 * @property int $section_order
 *
 * @property \App\Model\Entity\Section $section
 * @property \App\Model\Entity\JoinRequest $join_request
 */
class JoinRequestsSection extends Entity
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
        'section' => true,
        'join_request' => true,
	    'section_order' => true,
    ];
}
