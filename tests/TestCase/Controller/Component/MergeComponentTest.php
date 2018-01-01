<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\MergeComponent;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\MergeComponent Test Case
 */
class MergeComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\MergeComponent
     */
    public $Merge;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contacts',
        'app.scout_groups',
        'app.wp_roles',
        'app.file_uploads',
        'app.compass_uploads',
        'app.auth_users',
        'app.role_types',
        'app.roles',
        'app.section_types',
        'app.sections',
        'app.audits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Merge = new MergeComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Merge);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test Integrate Contact Function
     */
    public function testIntegrateContact()
    {
        $testHim = [
            'file_upload_id' => 1,
            'membership_number' => 990990,
            'title' => 'Mr',
            'first_name' => 'Jonathon',
            'last_name' => 'Creek',
            'address' => 'The Windmill, Somewhere, Spooky, CR3 0EK',
            'address_line1' => 'The Windmill',
            'address_line2' => 'Somewhere',
            'address_line3' => '',
            'address_town' => 'Spooky',
            'address_county' => '',
            'postcode' => 'CR3 0EK',
            'address_country' => 'United Kingdom',
            'role' => 'Assistant Section Leader - Beaver Scouts',
            'location' => 'Beaver Section @ 4th Letchworth (St Pauls)',
            'phone' => '01234 567890',
            'email' => 'someone@fish.llama',
            'clean_role' => 'Assistant Section Leader',
            'clean_group' => '4th Letchworth (St Pauls)',
            'clean_section' => 'Beaver Section',
            'provisional' => null,
        ];

        $response = $this->Merge->integrateContact($testHim);

        $this->assertNotFalse($response);
        $this->assertInstanceOf('App\Model\Entity\Contact', $response);

        $contacts = TableRegistry::get('Contacts');
        $contactQuery = $contacts
            ->find()
            ->where([
                'membership_number' => 990990,
                'email' => 'someone@fish.llama',
                'first_name' => 'Jonathon',
                'last_name' => 'Creek',
            ]);

        $contactCount = $contactQuery->count();
        $this->assertEquals(1, $contactCount);
    }

    /**
     * Test Integrate Contact Function
     */
    public function testIntegrateContactRole()
    {
        $testHim = [
            'file_upload_id' => 1,
            'membership_number' => 990990,
            'title' => 'Mr',
            'first_name' => 'Jonathon',
            'last_name' => 'Creek',
            'address' => 'The Windmill, Somewhere, Spooky, CR3 0EK',
            'address_line1' => 'The Windmill',
            'address_line2' => 'Somewhere',
            'address_line3' => '',
            'address_town' => 'Spooky',
            'address_county' => '',
            'postcode' => 'CR3 0EK',
            'address_country' => 'United Kingdom',
            'role' => 'Assistant Section Leader - Beaver Scouts',
            'location' => 'Beaver Section @ 4th Letchworth (St Pauls)',
            'phone' => '01234 567890',
            'email' => 'someone@fish.llama',
            'clean_role' => 'Assistant Section Leader',
            'clean_group' => '4th Letchworth (St Pauls)',
            'clean_section' => 'Beaver Section',
            'provisional' => null,
        ];

        $response = $this->Merge->integrateContact($testHim);

        $this->assertNotFalse($response);
        $this->assertInstanceOf('App\Model\Entity\Contact', $response);

        $sections = TableRegistry::get('Sections');
        $roleTypes = TableRegistry::get('RoleTypes');
        $groups = TableRegistry::get('ScoutGroups');
        $contacts = TableRegistry::get('Contacts');
        $roles = TableRegistry::get('Roles');

        $contactQuery = $contacts
            ->find()
            ->where([
                'membership_number' => 990990,
                'email' => 'someone@fish.llama',
                'first_name' => 'Jonathon',
                'last_name' => 'Creek',
            ]);

        $groupQuery = $groups
            ->find()
            ->where([
                'scout_group' => '4th Letchworth (St Pauls)'
            ]);

        $roleTypeQuery = $roleTypes
            ->find()
            ->where([
                'role_type' => 'Assistant Section Leader',
            ]);

        $sectionQuery = $sections
            ->find()
            ->where([
                'section' => 'Beaver Section',
                'scout_group_id' => $groupQuery->first()->id,
            ]);

        $contactCount = $contactQuery->count();
        $this->assertEquals(1, $contactCount);

        $groupCount = $groupQuery->count();
        $this->assertEquals(1, $groupCount);

        $roleTypeCount = $roleTypeQuery->count();
        $this->assertEquals(1, $roleTypeCount);

        $sectionCount = $sectionQuery->count();
        $this->assertEquals(1, $sectionCount);

        $roleCount = $roles
            ->find()
            ->where([
                'contact_id' => $contactQuery->first()->id,
                'section_id' => $sectionQuery->first()->id,
                'role_type_id' => $roleTypeQuery->first()->id,
            ])
            ->count();
        $this->assertEquals(1, $roleCount);
    }

    /**
     * Test Integrate Contact Function
     */
    public function testIntegrateContactBlankDistrict()
    {
        $testHim = [
            'file_upload_id' => 1,
            'membership_number' => 8876,
            'title' => 'Mr',
            'first_name' => 'Johan',
            'last_name' => 'Midas',
            'address' => 'The Windmill, Somewhere, Spooky, CR3 0EK',
            'address_line1' => 'The Windmill',
            'address_line2' => 'Somewhere',
            'address_line3' => '',
            'address_town' => 'Spooky',
            'address_county' => '',
            'postcode' => 'CR3 0EK',
            'address_country' => 'United Kingdom',
            'role' => 'Assistant Section Leader - Beaver Scouts',
            'location' => 'Beaver Section @ 4th Letchworth (St Pauls)',
            'phone' => '01234 567890',
            'email' => 'someone@goat.com',
            'clean_role' => 'District Scouter',
            'clean_group' => 'Letchworth And Baldock',
            'clean_section' => 'District',
            'provisional' => null,
        ];

        $response = $this->Merge->integrateContact($testHim);

        $this->assertNotFalse($response);
        $this->assertInstanceOf('App\Model\Entity\Contact', $response);

        $sections = TableRegistry::get('Sections');
        $roleTypes = TableRegistry::get('RoleTypes');
        $groups = TableRegistry::get('ScoutGroups');
        $contacts = TableRegistry::get('Contacts');
        $roles = TableRegistry::get('Roles');

        $contactQuery = $contacts
            ->find()
            ->where([
                'membership_number' => 8876,
                'email' => 'someone@goat.com',
                'first_name' => 'Johan',
                'last_name' => 'Midas',
            ]);

        $groupQuery = $groups
            ->find()
            ->where([
                'scout_group' => 'Letchworth And Baldock'
            ]);

        $roleTypeQuery = $roleTypes
            ->find()
            ->where([
                'role_type' => 'District Scouter',
            ]);

        $sectionQuery = $sections
            ->find()
            ->where([
                'section' => 'District',
                'scout_group_id' => $groupQuery->first()->id,
            ]);

        $contactCount = $contactQuery->count();
        $this->assertEquals(1, $contactCount);

        $groupCount = $groupQuery->count();
        $this->assertEquals(1, $groupCount);

        $roleTypeCount = $roleTypeQuery->count();
        $this->assertEquals(1, $roleTypeCount);

        $sectionCount = $sectionQuery->count();
        $this->assertEquals(1, $sectionCount);

        $roleCount = $roles
            ->find()
            ->where([
                'contact_id' => $contactQuery->first()->id,
                'section_id' => $sectionQuery->first()->id,
                'role_type_id' => $roleTypeQuery->first()->id,
            ])
            ->count();
        $this->assertEquals(1, $roleCount);
    }

    /**
     * Test the Contact Upload Function
     */
    public function testContactUpload()
    {
        $compassUploads = TableRegistry::get('CompassUploads');
        $compassUpload = $compassUploads->find()->where(['membership_number' => 999])->first();

        $response = $this->Merge->contactUpload($compassUpload->id);

        $this->assertNotFalse($response);
        $this->assertInstanceOf('App\Model\Entity\Contact', $response);
    }

    public function testAutoMerge()
    {
        $response = $this->Merge->autoMerge(1);

        $this->assertTrue($response);

        $response = $this->Merge->autoMerge(2);

        $this->assertFalse($response);

        $compassUploads = TableRegistry::get('CompassUploads');
        $compassUpload = $compassUploads->find()->where(['membership_number' => 999])->first();

        $mrgResponse = $this->Merge->contactUpload($compassUpload->id);

        $this->assertNotFalse($mrgResponse);
        $this->assertInstanceOf('App\Model\Entity\Contact', $mrgResponse);

        $response = $this->Merge->autoMerge(2);

        $this->assertTrue($response);
    }
}
