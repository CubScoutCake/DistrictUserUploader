<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JoinStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JoinStatusesTable Test Case
 */
class JoinStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JoinStatusesTable
     */
    public $JoinStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.join_statuses',
        'app.join_requests'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JoinStatuses') ? [] : ['className' => JoinStatusesTable::class];
        $this->JoinStatuses = TableRegistry::get('JoinStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JoinStatuses);

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
}
