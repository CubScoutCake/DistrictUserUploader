<?php
namespace App\Test\TestCase\Form;

use App\Form\SearchForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\SearchForm Test Case
 */
class SearchFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\SearchForm
     */
    public $Search;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Search = new SearchForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Search);

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
