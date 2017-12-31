<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuditsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuditsTable Test Case
 */
class AuditsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuditsTable
     */
    public $Audits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.audits',
        'app.auth_users',
        'app.contacts',
        'app.wp_roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Audits') ? [] : ['className' => AuditsTable::class];
        $this->Audits = TableRegistry::get('Audits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Audits);

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
     * Test Save Method
     *
     * @return void
     */
    public function testSave()
    {
        $saveData = [
            'audit_field' => 'membership_number',
            'contact_id' => 1,
            'original_value' => null,
            'modified_value' => '989898',
        ];

        $response = $this->Audits->newEntity($saveData);
        $this->assertInstanceOf('Cake\ORM\Entity', $response);

        $response = $this->Audits->save($response);
        $this->assertInstanceOf('Cake\ORM\Entity', $response);
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
}
