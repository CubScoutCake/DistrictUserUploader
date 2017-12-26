<?php
namespace JacobAGTyler\GitHubIssueSubmitter\Test\TestCase\Form;

use Cake\Http\Client;
use Cake\TestSuite\TestCase;
use JacobAGTyler\GitHubIssueSubmitter\Form\IssueForm;

/**
 * JacobAGTyler\GitHubIssueSubmitter\Form\IssueForm Test Case
 */
class IssueFormTest extends TestCase
{
	private $mockLogger;
	private $mockClient;
	private $linkService;

	public function prepareMocks($url, $json)
	{
		$responseInterface = $this->getMockBuilder('\Guzzle\Http\Message\Response')
		                          ->disableOriginalConstructor()
		                          ->getMock();
		$responseInterface->method('getBody')
		                  ->with($this->equalTo(true))
		                  ->will($this->returnValue($json));

		$requestInterface = $this->getMockBuilder('Cake\Http\Client')->getMock();
		$requestInterface->method('post')->will($this->returnValue($responseInterface));

		$this->mockClient = $this->getMock('\Guzzle\Http\Client');

		$this->mockClient->method('get')
		                 ->with($this->equalTo($url))
		                 ->will($this->returnValue($requestInterface));
		$this->linkService = new DefaultPreviewImageLinkService($this->mockLogger, $this->mockClient);
	}

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
	    $this->markTestIncomplete('Not implemented yet.');

		$url = 'https://api.github.com/repos/CubScoutCake/DistrictUserUploader/issues';
	    $json = '{
				    "url": "https://api.github.com/repos/CubScoutCake/DistrictUserUploader/issues/23",
				    "repository_url": "https://api.github.com/repos/CubScoutCake/DistrictUserUploader",
				    "labels_url": "https://api.github.com/repos/CubScoutCake/DistrictUserUploader/issues/23/labels{/name}",
				    "comments_url": "https://api.github.com/repos/CubScoutCake/DistrictUserUploader/issues/23/comments",
				    "events_url": "https://api.github.com/repos/CubScoutCake/DistrictUserUploader/issues/23/events",
				    "html_url": "https://github.com/CubScoutCake/DistrictUserUploader/issues/23",
				    "id": 284612097,
				    "number": 23,
				    "title": "Issue Created from Postman Test.",
				    "user": {
				        "login": "JacobAGTyler",
				        "id": 3827053,
				        "avatar_url": "https://avatars2.githubusercontent.com/u/3827053?v=4",
				        "gravatar_id": "",
				        "url": "https://api.github.com/users/JacobAGTyler",
				        "html_url": "https://github.com/JacobAGTyler",
				        "followers_url": "https://api.github.com/users/JacobAGTyler/followers",
				        "following_url": "https://api.github.com/users/JacobAGTyler/following{/other_user}",
				        "gists_url": "https://api.github.com/users/JacobAGTyler/gists{/gist_id}",
				        "starred_url": "https://api.github.com/users/JacobAGTyler/starred{/owner}{/repo}",
				        "subscriptions_url": "https://api.github.com/users/JacobAGTyler/subscriptions",
				        "organizations_url": "https://api.github.com/users/JacobAGTyler/orgs",
				        "repos_url": "https://api.github.com/users/JacobAGTyler/repos",
				        "events_url": "https://api.github.com/users/JacobAGTyler/events{/privacy}",
				        "received_events_url": "https://api.github.com/users/JacobAGTyler/received_events",
				        "type": "User",
				        "site_admin": false
				    },
				    "labels": [
				        {
				            "id": 775934931,
				            "url": "https://api.github.com/repos/CubScoutCake/DistrictUserUploader/labels/AutoTest",
				            "name": "AutoTest",
				            "color": "ededed",
				            "default": false
				        },
				        {
				            "id": 775934932,
				            "url": "https://api.github.com/repos/CubScoutCake/DistrictUserUploader/labels/IssueSubmitter",
				            "name": "IssueSubmitter",
				            "color": "ededed",
				            "default": false
				        }
				    ],
				    "state": "open",
				    "locked": false,
				    "assignee": null,
				    "assignees": [],
				    "milestone": null,
				    "comments": 0,
				    "created_at": "2017-12-26T21:26:32Z",
				    "updated_at": "2017-12-26T21:26:32Z",
				    "closed_at": null,
				    "author_association": "OWNER",
				    "body": "The issue has been created via the API as a test of a Form Creation.",
				    "closed_by": null
				}';
	    $this->prepareMocks($url, $json);

    	$dataArray = [
    		'issue' => 'Test Issue for Auto Test.',
		    'description' => 'This issue is created as part of a suite of automated tests.'
	    ];
    	$response = $this->Issue->execute($dataArray);

    	$this->assertTrue($response);
    }
}
