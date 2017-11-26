<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AuthUsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AuthUsersController Test Case
 */
class AuthUsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auth_users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'AuthUsers', 'action' => 'index']);

        $this->assertRedirectContains('/login');

	    $this->session(['Auth.User.id' => 1]);

	    $this->get(['controller' => 'AuthUsers', 'action' => 'index']);

	    $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
	    $this->get(['controller' => 'AuthUsers', 'action' => 'view', 1]);

	    $this->assertRedirectContains('/login');

	    $this->session(['Auth.User.id' => 1]);

	    $this->get(['controller' => 'AuthUsers', 'action' => 'view', 1]);

	    $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
	    $this->get(['controller' => 'AuthUsers', 'action' => 'add']);

	    $this->assertRedirectContains('/login');

	    $this->session(['Auth.User.id' => 1]);

	    $this->get(['controller' => 'AuthUsers', 'action' => 'add']);

	    $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
	    $this->get(['controller' => 'AuthUsers', 'action' => 'edit', 1]);

	    $this->assertRedirectContains('/login');

	    $this->session(['Auth.User.id' => 1]);

	    $this->get(['controller' => 'AuthUsers', 'action' => 'edit', 1]);

	    $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
	    $this->get(['controller' => 'AuthUsers', 'action' => 'delete']);

	    $this->assertRedirectContains('/login');

	    $this->session(['Auth.User.id' => 1]);

	    $this->enableCsrfToken();
	    $this->enableSecurityToken();

	    $this->post(['controller' => 'AuthUsers', 'action' => 'delete', 1]);

	    $this->assertRedirect();
    }
}
