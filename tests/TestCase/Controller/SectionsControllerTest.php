<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SectionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SectionsController Test Case
 */
class SectionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sections',
        'app.section_types'
    ];

	/**
	 * Test index method
	 *
	 * @return void
	 */
	public function testIndex()
	{
		$this->get(['controller' => 'Sections', 'action' => 'index']);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'Sections', 'action' => 'index']);

		$this->assertResponseOk();
	}

	/**
	 * Test view method
	 *
	 * @return void
	 */
	public function testView()
	{
		$this->get(['controller' => 'Sections', 'action' => 'view', 1]);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'Sections', 'action' => 'view', 1]);

		$this->assertResponseOk();
	}

	/**
	 * Test add method
	 *
	 * @return void
	 */
	public function testAdd()
	{
		$this->get(['controller' => 'Sections', 'action' => 'add']);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'Sections', 'action' => 'add']);

		$this->assertResponseOk();
	}

	/**
	 * Test edit method
	 *
	 * @return void
	 */
	public function testEdit()
	{
		$this->get(['controller' => 'Sections', 'action' => 'edit', 1]);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->get(['controller' => 'Sections', 'action' => 'edit', 1]);

		$this->assertResponseOk();
	}

	/**
	 * Test delete method
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$this->get(['controller' => 'Sections', 'action' => 'delete']);

		$this->assertRedirectContains('/login');

		$this->session(['Auth.User.id' => 1]);

		$this->enableCsrfToken();
		$this->enableSecurityToken();

		$this->post(['controller' => 'Sections', 'action' => 'delete', 1]);

		$this->assertRedirect();
	}
}
