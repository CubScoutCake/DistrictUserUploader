<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthUsersTable Test Case
 */
class AuthUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthUsersTable
     */
    public $AuthUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auth_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthUsers') ? [] : ['className' => AuthUsersTable::class];
        $this->AuthUsers = TableRegistry::get('AuthUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthUsers);

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
