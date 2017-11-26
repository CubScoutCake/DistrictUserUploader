<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WpRolesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WpRolesController Test Case
 */
class WpRolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wp_roles',
        'app.contacts'
    ];

	/**
	 * Test index method
	 *
	 * @return void
	 */
	public function testIndex()
	{
		$this->get(['controller' => 'WpRoles', 'action' => 'index']);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'WpRoles', 'action' => 'index']);

		$this->assertResponseOk();
	}

	/**
	 * Test view method
	 *
	 * @return void
	 */
	public function testView()
	{
		$this->get(['controller' => 'WpRoles', 'action' => 'view', 1]);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'WpRoles', 'action' => 'view', 1]);

		$this->assertResponseOk();
	}

	/**
	 * Test add method
	 *
	 * @return void
	 */
	public function testAdd()
	{
		$this->get(['controller' => 'WpRoles', 'action' => 'add']);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'WpRoles', 'action' => 'add']);

		$this->assertResponseOk();
	}

	/**
	 * Test edit method
	 *
	 * @return void
	 */
	public function testEdit()
	{
		$this->get(['controller' => 'WpRoles', 'action' => 'edit', 1]);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'WpRoles', 'action' => 'edit', 1]);

		$this->assertResponseOk();
	}

	/**
	 * Test delete method
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$this->get(['controller' => 'WpRoles', 'action' => 'delete', 2]);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->enableCsrfToken();
		$this->enableSecurityToken();

		$this->post(['controller' => 'WpRoles', 'action' => 'delete', 2]);

		$this->assertRedirect();
	}
}
