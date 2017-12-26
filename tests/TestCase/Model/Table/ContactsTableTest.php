<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactsTable Test Case
 */
class ContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactsTable
     */
    public $Contacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contacts',
        'app.wp_roles',
        'app.roles',
        'app.role_types',
        'app.section_types',
        'app.sections',
        'app.scout_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contacts') ? [] : ['className' => ContactsTable::class];
        $this->Contacts = TableRegistry::get('Contacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contacts);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test beforeRules method
     *
     * @return void
     */
    public function testBeforeRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findNew method
     *
     * @return void
     */
    public function testFindNew()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findContactOrCreate method
     *
     * @return void
     */
    public function testFindContactOrCreate()
    {
        $goodArray = [
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
            'address_county' => '',
            'postcode' => 'SG6 1QB',
            'address_country' => 'United Kingdom',
            'role' => 'Assistant Section Leader - Beaver Scouts',
            'location' => 'Beaver Section @ 4th Letchworth (St Pauls)',
            'phone' => '01462637289',
            'email' => 'alan.j.mann@gmail.com',
        ];

        $response = $this->Contacts->findContactOrCreate($goodArray);
        $this->assertInstanceOf('Cake\ORM\Entity', $response);
    }
}
