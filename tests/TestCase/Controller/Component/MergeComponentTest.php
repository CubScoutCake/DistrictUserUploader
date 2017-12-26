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
            'id' => 3,
            'file_upload_id' => 1,
            'membership_number' => 895271,
            'title' => 'Mr',
            'first_name' => 'Alan',
            'last_name' => 'Mann',
            'address' => ' 24 Broughton Hill Letchworth Garden City. SG6 1QB',
            'address_line1' => '24 Broughton Hill',
            'address_line2' => '',
            'address_line3' => '',
            'address_town' => 'Letchworth Garden City',
            'address_county' => 'Hertfordshire',
            'postcode' => 'SG6 1QB',
            'address_country' => 'United Kingdom',
            'role' => 'Assistant Section Leader - Beaver Scouts',
            'location' => 'Beaver Section @ 4th Letchworth (St Pauls)',
            'phone' => '01462637289',
            'email' => 'alan.j.mann@gmail.com',
            'clean_role' => 'Assistant Section Leader',
            'clean_group' => '4th Letchworth (St Pauls)',
            'clean_section' => 'Beaver Section',
            'provisional' => null,
        ];

        $response = $this->Merge->integrateContact($testHim);

        $this->assertNotFalse($response);
        $this->assertInstanceOf('App\Model\Entity\Contact', $response);
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
