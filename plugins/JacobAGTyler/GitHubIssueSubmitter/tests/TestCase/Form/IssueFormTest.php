<?php
namespace JacobAGTyler\GitHubIssueSubmitter\Test\TestCase\Form;

use Cake\TestSuite\TestCase;
use JacobAGTyler\GitHubIssueSubmitter\Form\IssueForm;

/**
 * JacobAGTyler\GitHubIssueSubmitter\Form\IssueForm Test Case
 */
class IssueFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \JacobAGTyler\GitHubIssueSubmitter\Form\IssueForm
     */
    public $Issue;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Issue = new IssueForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Issue);

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

    /**
     * Test Execution
     */
    public function testExecute()
    {
    	$dataArray = [
    		'issue' => 'Test Issue for Auto Test.',
		    'description' => 'This issue is created as part of a suite of automated tests.'
	    ];
    	$response = $this->Issue->execute($dataArray);

    	$this->assertTrue($response);
    }
}
