<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JoinRequestsSectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JoinRequestsSectionsTable Test Case
 */
class JoinRequestsSectionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JoinRequestsSectionsTable
     */
    public $JoinRequestsSections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.join_requests_sections',
        'app.sections',
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
        $config = TableRegistry::exists('JoinRequestsSections') ? [] : ['className' => JoinRequestsSectionsTable::class];
        $this->JoinRequestsSections = TableRegistry::get('JoinRequestsSections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JoinRequestsSections);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
