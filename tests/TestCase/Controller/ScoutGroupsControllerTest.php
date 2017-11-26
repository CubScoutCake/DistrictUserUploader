<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ScoutGroupsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ScoutGroupsController Test Case
 */
class ScoutGroupsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.scout_groups'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'ScoutGroups', 'action' => 'index']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'ScoutGroups', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get(['controller' => 'ScoutGroups', 'action' => 'view', 1]);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'ScoutGroups', 'action' => 'view', 1]);

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get(['controller' => 'ScoutGroups', 'action' => 'add']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'ScoutGroups', 'action' => 'add']);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get(['controller' => 'ScoutGroups', 'action' => 'edit', 1]);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'ScoutGroups', 'action' => 'edit', 1]);

        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->get(['controller' => 'ScoutGroups', 'action' => 'delete']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(['controller' => 'ScoutGroups', 'action' => 'delete', 1]);

        $this->assertRedirect();
    }
}
