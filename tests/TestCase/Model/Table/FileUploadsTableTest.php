<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FileUploadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FileUploadsTable Test Case
 */
class FileUploadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FileUploadsTable
     */
    public $FileUploads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.file_uploads',
        'app.auth_users',
        'app.compass_uploads'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FileUploads') ? [] : ['className' => FileUploadsTable::class];
        $this->FileUploads = TableRegistry::get('FileUploads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FileUploads);

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
