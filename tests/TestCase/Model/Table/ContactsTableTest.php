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
        'app.scout_groups',
        'app.audits',
        'app.auth_users',
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
        $entityData = [
            'membership_number' => 989898,
            'first_name' => 'Alan',
            'last_name' => 'Davis',
            'email' => 'llama@goat.boat',
            'wp_role_id' => 1,
            'address_line_1' => 'The New Windmill',
            'address_line_2' => 'Up the Creek',
            'city' => 'SpookyTown',
            'postcode' => 'JH1 9KJ',
            'preferred_name' => 'Winifred',
        ];
        $contact = $this->Contacts->newEntity($entityData);
        $this->assertInstanceOf('Cake\ORM\Entity', $contact);

        $contact = $this->Contacts->save($contact);
        $this->assertInstanceOf('Cake\ORM\Entity', $contact);

        $retrieved = $this->Contacts->get($contact->id);
        $this->assertInstanceOf('Cake\ORM\Entity', $retrieved);

        $retrieved = $this->Contacts->patchEntity($retrieved, [
            'preferred_name' => 'Joan',
            'last_name' => 'Cummings',
            'validated' => true,
        ]);

        $dirty = $retrieved->getDirty();
        $expected = [
            'preferred_name',
            'last_name',
            'validated'
        ];

        $this->assertEquals($expected, $dirty);

        $retrieved = $this->Contacts->save($retrieved);
        $this->assertInstanceOf('Cake\ORM\Entity', $retrieved);
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
        ];

        $response = $this->Contacts->findOrMakeContact($goodArray);
        $this->assertInstanceOf('Cake\ORM\Entity', $response);
    }

    public function testAuditSave()
    {
        $newThing = $this->Contacts->newEntity([
                'membership_number' => 989898,
                'first_name' => 'Alan',
                'last_name' => 'Davis',
                'email' => 'llama@goat.boat',
                'wp_role_id' => 1,
            ]);

        $this->Contacts->auditSave($newThing, 1);
        $this->assertInstanceOf('Cake\ORM\Entity', $newThing);

        $this->Contacts->save($newThing);
        $this->assertInstanceOf('Cake\ORM\Entity', $newThing);

        $thingId = $newThing->id;

        $retrievedThing = $this->Contacts->get($thingId);

        $retrievedThing = $this->Contacts->patchEntity($retrievedThing, [
                'address_line_1' => 'The New Windmill',
                'address_line_2' => 'Up the Creek',
                'city' => 'SpookyTown',
                'postcode' => 'JH1 9KJ',
                'preferred_name' => 'Winifred',
                'email' => 'fish@llamallama.octopus',
            ]);

        $this->Contacts->auditSave($retrievedThing);
        $this->assertInstanceOf('Cake\ORM\Entity', $retrievedThing);
    }
}
