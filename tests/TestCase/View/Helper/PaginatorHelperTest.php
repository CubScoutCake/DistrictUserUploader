<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\MyPageHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\MyPageHelper Test Case
 */
class PaginatorHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\MyPageHelper
     */
    public $Paginator;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Paginator = new MyPageHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Paginator);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
