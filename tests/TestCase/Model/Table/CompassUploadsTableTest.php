<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompassUploadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompassUploadsTable Test Case
 */
class CompassUploadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompassUploadsTable
     */
    public $CompassUploads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.compass_uploads',
        'app.file_uploads',
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
        $config = TableRegistry::exists('CompassUploads') ? [] : ['className' => CompassUploadsTable::class];
        $this->CompassUploads = TableRegistry::get('CompassUploads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompassUploads);

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
