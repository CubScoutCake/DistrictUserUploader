<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JoinRequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JoinRequestsTable Test Case
 */
class JoinRequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JoinRequestsTable
     */
    public $JoinRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.join_requests',
        'app.join_statuses',
        'app.sections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JoinRequests') ? [] : ['className' => JoinRequestsTable::class];
        $this->JoinRequests = TableRegistry::get('JoinRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JoinRequests);

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
}
