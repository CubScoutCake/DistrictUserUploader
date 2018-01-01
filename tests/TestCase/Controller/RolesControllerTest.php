<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RolesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RolesController Test Case
 */
class RolesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.roles',
        'app.role_types',
        'app.section_types',
        'app.sections',
        'app.wp_roles',
        'app.contacts',
        'app.scout_groups',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'Roles', 'action' => 'index']);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Roles', 'action' => 'index']);
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get(['controller' => 'Roles', 'action' => 'view', 1]);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Roles', 'action' => 'view', 1]);
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get(['controller' => 'Roles', 'action' => 'add']);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Roles', 'action' => 'add']);
        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(
            [
                'controller' => 'Roles',
                'action' => 'add'
            ],
            [
                'contact_id' => 1,
                'role_type_id' => 1,
                'section_id' => 2,
                'provisional' => true,
            ]
        );
        $this->assertRedirect();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get(['controller' => 'Roles', 'action' => 'edit', 1]);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'Roles', 'action' => 'edit', 1]);
        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(
            [
                'controller' => 'Roles',
                'action' => 'edit',
                1
            ],
            [
                'contact_id' => 1,
                'role_type_id' => 1,
                'section_id' => 2,
                'provisional' => true,
            ]
        );
        $this->assertRedirect();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->get(['controller' => 'Roles', 'action' => 'delete']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(['controller' => 'Roles', 'action' => 'delete', 1]);

        $this->assertRedirect();
    }
}
