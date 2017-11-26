<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WpRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WpRolesTable Test Case
 */
class WpRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WpRolesTable
     */
    public $WpRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wp_roles',
        'app.contact'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WpRoles') ? [] : ['className' => WpRolesTable::class];
        $this->WpRoles = TableRegistry::get('WpRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WpRoles);

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
