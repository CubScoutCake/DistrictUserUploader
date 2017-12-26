<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

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
     * @param array $mergeContact The Uploaded Contact to be merged
     *
     * @return bool The value to be set
     *
     */
    public function contactUpload(array $mergeContact)
    {
        $contacts = TableRegistry::get('Contacts');

        if (key_exists('membership_number', $mergeContact)
            && key_exists('first_name', $mergeContact)
            || key_exists('email', $mergeContact)
        ) {
            $contact = $contacts->findContactOrCreate($mergeContact);

            if (!empty($mergeContact['clean_section']) && !empty($mergeContact['clean_role']) && !empty($mergeContact['clean_group'])) {
                $sectionTypes = TableRegistry::get('SectionTypes');
                $roleTypes = TableRegistry::get('RoleTypes');
                $sections = TableRegistry::get('Sections');

                $terms = explode(' ', $mergeContact['clean_section']);

                $termMatch = 0;
                $scoutMatch = 0;

                $types = $sectionTypes->find('all')->toArray();

                foreach ($types as $type) {
                    $sectionType = strtoupper(Inflector::singularize($type->section_type));
                    foreach ($terms as $term) {
                        $term = strtoupper(Inflector::singularize($term));
                    }

                    if (in_array($sectionType, $terms)) {
                        $termMatch += 1;
                        if ($sectionType == 'SCOUT') {
                            $scoutMatch += 1;
                            $scoutId = $type->id;
                        }
                        $termId = $type->id;
                    }
                }

                if ($termMatch == 1 && isset($termId)) {
                    $typeId = $termId;
                } elseif ($scoutMatch == 1 && isset($scoutId)) {
                    $typeId = $scoutId;
                }

                $roleType = $roleTypes->findOrCreate(['role_type' => $mergeContact['clean_role']]);

                if ($roleType instanceof Entity) {
                    $roleTypeId = $roleType->id;

                    if (empty($roleType->role_abbreviation)) {
                        $abbrev = $mergeContact['clean_role'];
                        if (preg_match_all('/\b(\w)/', strtoupper($mergeContact['clean_role']), $exploded)) {
                            $abbrev = implode('', $exploded[1]); // $v is now SOQTU
                        }

                        $roleType->set('role_abbreviation', $abbrev);

                        $roleTypes->save($roleType);
                    }
                }

                if (isset($groupId) && isset($typeId)) {
                    $section = $sections->findOrCreate([
                        'section' => $mergeContact['clean_section'],
                        'scout_group_id' => $groupId,
                        'section_type_id' => $typeId,
                    ]);

                    if ($section instanceof Entity) {
                        $sectionId = $section->id;
                    }
                }

                if (isset($sectionId) && isset($roleTypeId)) {
                    $contact = $contacts->patchEntity(
                        $contact,
                        [
                            'role' => [
                                'section_id' => $sectionId,
                                'role_type_id' => $roleTypeId,
                                'provisional' => $mergeContact['provisional'],
                            ]
                        ],
                        [
                            'associated' => [
                                'Roles',
                            ]
                        ]
                    );

                    $contact->setDirty('Roles', true);

                    $contacts->save($contact, [
                        'associated' => [
                            'Roles',
                        ]
                    ]);
                }
            }

            return $contact;
        }

        return false;
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
