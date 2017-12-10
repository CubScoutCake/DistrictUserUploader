<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ContactsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ContactsController Test Case
 */
class ContactsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contacts',
        'app.scout_groups',
        'app.wp_roles',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'Contacts', 'action' => 'index']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Contacts', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get(['controller' => 'Contacts', 'action' => 'view', 1]);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Contacts', 'action' => 'view', 1]);

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get(['controller' => 'Contacts', 'action' => 'add']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Contacts', 'action' => 'add']);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get(['controller' => 'Contacts', 'action' => 'edit', 1]);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Contacts', 'action' => 'edit', 1]);

        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->get(['controller' => 'Contacts', 'action' => 'delete']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(['controller' => 'Contacts', 'action' => 'delete', 1]);

        $this->assertRedirect();
    }
}
