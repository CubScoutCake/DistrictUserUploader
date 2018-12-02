<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestTracesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestTracesTable Test Case
 */
class RequestTracesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestTracesTable
     */
    public $RequestTraces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.request_traces'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequestTraces') ? [] : ['className' => RequestTracesTable::class];
        $this->RequestTraces = TableRegistry::get('RequestTraces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequestTraces);

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
