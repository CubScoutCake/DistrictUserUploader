<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SectionTypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SectionTypesController Test Case
 */
class SectionTypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.section_types',
        'app.sections'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get(['controller' => 'SectionTypes', 'action' => 'index']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'SectionTypes', 'action' => 'index']);

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get(['controller' => 'SectionTypes', 'action' => 'view', 1]);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'SectionTypes', 'action' => 'view', 1]);

        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get(['controller' => 'SectionTypes', 'action' => 'add']);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'SectionTypes', 'action' => 'add']);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get(['controller' => 'SectionTypes', 'action' => 'edit', 1]);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->get(['controller' => 'SectionTypes', 'action' => 'edit', 1]);

        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->get(['controller' => 'SectionTypes', 'action' => 'delete', 2]);

        $this->assertRedirectContains('/login');

        $this->session(['Auth.User.id' => 1]);

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        $this->post(['controller' => 'SectionTypes', 'action' => 'delete', 2]);

        $this->assertRedirect();
    }
}
