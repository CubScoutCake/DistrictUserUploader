<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RoleTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RoleTypesTable Test Case
 */
class RoleTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RoleTypesTable
     */
    public $RoleTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.role_types',
        'app.section_types',
        'app.sections',
        'app.roles',
        'app.wp_roles',
        'app.scout_groups',
        'app.contacts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RoleTypes') ? [] : ['className' => RoleTypesTable::class];
        $this->RoleTypes = TableRegistry::get('RoleTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RoleTypes);

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
