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
        'file_upload' => true,
//      'provisional' => true,
//      'clean_role' => true,
    ];

    /**
     * Prov / PreProv Virtual Field
     *
     * @return bool
     */
    protected function _getProvisional()
    {
        return !empty(preg_match('/[(](Pre-)*(Prov)[)]/', $this->_properties['role']));
    }

    /**
     * Cleaned Role
     *
     * @return string
     */
    protected function _getCleanRole()
    {
        $role = preg_replace('/[(](Pre-)*(Prov)[)]/', '', $this->_properties['role']);
        $roles = explode(' - ', $role);
        $role = $roles[0];
        $role = trim($role);

        return $role;
    }

    /**
     * Cleaned Group
     *
     * @return string
     */
    protected function _getCleanGroup()
    {
        $groupArr = explode('@', $this->_properties['location']);

        if (!empty($groupArr[1])) {
            $group = $groupArr[1];
        } else {
            $group = $groupArr[0];
        }
        $group = trim($group);

        return $group;
    }

    /**
     * Cleaned Section
     *
     * @return string
     */
    protected function _getCleanSection()
    {
        $groupArr = explode('@', $this->_properties['location']);

        if (!empty($groupArr[1])) {
            $group = $groupArr[1];
        } else {
            $group = $groupArr[0];
        }
        $group = trim($group);

        $sectionArr = explode('@', $this->_properties['location']);
        $section = $sectionArr[0];
        $section = trim($section);

        //$roleSection = preg_replace('/[(](Pre-)*(Prov)[)]/', '', $this->_properties['role']);
        //$roleSectionArr = explode(' - ', $roleSection);
        //
        //$roleSection = $roleSectionArr[0];
        //if (!empty($roleSectionArr[1])) {
        //  $roleSection = $roleSectionArr[1];
        //}
        //$roleSection = trim($roleSection);

        $entityMap = [
            'Hertfordshire' => 'County',
            'Bedfordshire' => 'County',
            'Letchworth And Baldock' => 'District',
            'UK Scout Network' => 'Network',
            'Derbyshire' => 'County',
            'Scout Active Support Unit' => 'SAS'
        ];

        if (key_exists($group, $entityMap)) {
            return $entityMap[$group];
        }

        if ($section <> $group) {
            return $section;
        }

        if ($section == $group) {
            return 'Group';
        }

        return null;
    }

    /**
     * Return a First Name Field
     *
     * @return string
     */
    protected function _getFirstName()
    {
        $foreNames = explode(' ', $this->_properties['forenames']);

        return ucwords(strtolower($foreNames[0]));
    }

    /**
     * Return a Last Name Field
     *
     * @return string
     */
    protected function _getLastName()
    {
        return ucwords(strtolower($this->_properties['surname']));
    }

    protected $_virtual = ['provisional', 'clean_role', 'clean_group', 'clean_section', 'first_name', 'last_name'];
}
