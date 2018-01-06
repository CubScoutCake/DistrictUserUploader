<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Merge component
 */
class MergeComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @param int $uploadId The ID of the Upload
     *
     * @return bool The value to be set
     *
     */
    public function contactUpload($uploadId)
    {
        $compassUploads = TableRegistry::get('CompassUploads');

        $compassUpload = $compassUploads->get($uploadId)->toArray();

        return $this->integrateContact($compassUpload);
    }

    /**
     * @param array $mergeContact The Contact Data to be merged - Must contain all keys.
     *
     * @return bool|\Cake\Datasource\EntityInterface
     */
    public function integrateContact(array $mergeContact)
    {
        if (!key_exists('membership_number', $mergeContact)
            || !key_exists('first_name', $mergeContact)
            || !key_exists('email', $mergeContact)
            || !key_exists('clean_role', $mergeContact)
            || !key_exists('clean_group', $mergeContact)
            || !key_exists('clean_section', $mergeContact)
        ) {
            return false;
        }

        $contacts = TableRegistry::get('Contacts');

        $contact = $contacts->findOrMakeContact($mergeContact);

        if (!($contact instanceof Entity)) {
            return false;
        }

        $roleTypes = TableRegistry::get('RoleTypes');
        $sections = TableRegistry::get('Sections');

        $sectionCreate = [
            'group' => $mergeContact['clean_group'],
            'section' => $mergeContact['clean_section'],
        ];
        $section = $sections->findOrMakeSection($sectionCreate);

        if ($section instanceof Entity) {
            $sectionId = $section->id;

            $roleTypeArr = [
                'role' => $mergeContact['clean_role'],
                'section_type_id' => $section->section_type_id,
            ];

            $roleType = $roleTypes->findOrMakeRoleType($roleTypeArr);

            if ($roleType instanceof Entity) {
                $roleTypeId = $roleType->id;
            }
        }

        if (isset($sectionId) && isset($roleTypeId)) {
            $roles = TableRegistry::get('Roles');

            $roleArray = [
                    'section_id' => $sectionId,
                    'role_type_id' => $roleTypeId,
                    'contact_id' => $contact->id,
                    'provisional' => $mergeContact['provisional'],
                ];

            $role = $roles->newEntity($roleArray);

            $roles->save($role);
        }

        return $contact;
    }

    /**
     * @param int $compassUploadId The ID for the Compass Upload
     *
     * @return bool
     */
    public function autoMerge($compassUploadId)
    {
        $compassUploads = TableRegistry::get('CompassUploads');
        $contacts = TableRegistry::get('Contacts');

        $compassUpload = $compassUploads->get($compassUploadId);

        $memberShip = $contacts->find()->where(['membership_number' => $compassUpload->membership_number])->count();

        if ($memberShip == 1) {
            return true;
        }

        $allowedRoles = [
            'Group Treasurer',
            'District Commissioner',
            'Section Leader',
            'Scout Active Support Member',
            'Assistant Section Leader',
            'District Explorer Scout Commissioner',
            'County Scout Active Support Member',
            'Group Executive Committee Member',
            'District Badge Secretary',
            'Group Chairman',
        ];

        if (in_array($compassUpload->clean_role, $allowedRoles) && !$compassUpload->provisional) {
            return true;
        }

        return false;
    }
}
