<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RoleTypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RoleTypesController Test Case
 */
class RoleTypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.role_types',
        'app.section_types',
        'app.sections',
        'app.scout_groups',
        'app.roles',
        'app.contacts',
        'app.wp_roles',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'RoleTypes', 'action' => 'index']);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'RoleTypes', 'action' => 'index']);
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get(['controller' => 'RoleTypes', 'action' => 'view', 1]);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'RoleTypes', 'action' => 'view', 1]);
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get(['controller' => 'RoleTypes', 'action' => 'add']);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'RoleTypes', 'action' => 'add']);
        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(
            [
                'controller' => 'RoleTypes',
                'action' => 'add'
            ],
            [
                'role_type' => 'New Role Type',
                'role_abbreviation' => 'New',
                'section_type_id' => 1,
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
        $this->get(['controller' => 'RoleTypes', 'action' => 'edit', 1]);
        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'RoleTypes', 'action' => 'edit', 1]);
        $this->assertResponseOk();

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(
            [
                'controller' => 'RoleTypes',
                'action' => 'edit',
                1
            ],
            [
                'role_type' => 'New Role Type',
                'role_abbreviation' => 'New',
                'section_type_id' => 1,
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
        $this->get(['controller' => 'RoleTypes', 'action' => 'delete']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(['controller' => 'RoleTypes', 'action' => 'delete', 1]);

        $this->assertRedirect();
    }
}
