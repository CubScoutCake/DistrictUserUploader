<?php
namespace App\Test\TestCase\Controller\Api;

use App\Controller\Api\ContactsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Api\ContactsController Test Case
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
        'app.wp_roles',
        'app.scout_groups'
    ];

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');

        $this->configRequest([
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer: basic-token'
            ]
        ]);
        $this->get('/api/contacts');

        // Check that the response was a 200
        $this->assertResponseOk();

        $expected = [
            ['id' => 1, 'lng' => 66, 'lat' => 45],
        ];
        $expected = json_encode($expected);
        $this->assertEquals($expected, $this->_response->body());
    }

    /**
     * Test new method
     *
     * @return void
     */
    public function testNew()
    {
        $this->markTestIncomplete('Not implemented yet.');

        $this->configRequest([
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer: basic-token'
            ]
        ]);
        $this->get('/api/contacts');

        // Check that the response was a 200
        $this->assertResponseOk();

        $expected = [
            ['id' => 1, 'lng' => 66, 'lat' => 45],
        ];
        $expected = json_encode($expected);
        $this->assertEquals($expected, $this->_response->body());
    }

    /**
     * Test assign_wp method
     *
     * @return void
     */
    public function testAssign()
    {
        $this->markTestIncomplete('Not implemented yet.');

        $this->configRequest([
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Bearer: basic-token'
            ]
        ]);
        $this->post('/api/contacts/assign/email@llama.com/69', []);

        // Check that the response was a 200
        $this->assertResponseOk();
    }
}
