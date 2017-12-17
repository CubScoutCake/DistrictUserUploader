<?php
namespace JacobAGTyler\GitHubIssueSubmitter\Form;

use Cake\Core\Configure;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Http\Client;
use Cake\Validation\Validator;

/**
 * Issue Form.
 */
class IssueForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema(Schema $schema)
    {
	    $schema
		    ->addField('issue', 'string')
	        ->addField('description', 'string');

        return $schema;
    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator(Validator $validator)
    {
    	$validator
		    ->requirePresence('issue')
		    ->requirePresence('description')
		    ->ascii('issue')
		    ->ascii('description')
		    ->scalar('issue')
		    ->scalar('description')
		    ->notEmpty('issue')
		    ->notEmpty('description')
		    ->maxLength('issue', 63)
		    ->minLength('issue', 10)
		    ->maxLength('description', 511)
		    ->minLength('description', 10);

        return $validator;
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute(array $data)
    {
        $requestArray = [
	        'title'=> $data['issue'],
	        'body'=> $data['description'],
	        'labels'=> [
		        'AutoTest',
		        'IssueSubmitter'
	        ]
        ];

        $requestJson = json_encode($requestArray);

	    if (!($apiToken = Configure::readOrFail('GitHub.personal_token'))) {
		    return false;
	    };
	    if (!($apiUser = Configure::readOrFail('GitHub.personal_user'))) {
		    return false;
	    };
	    if (!($apiRepoOwner = Configure::readOrFail('GitHub.repo_owner'))) {
		    return false;
	    };
	    if (!($apiRepoName = Configure::readOrFail('GitHub.repo_name'))) {
		    return false;
	    };
	    if (!($apiBase = Configure::readOrFail('GitHub.root_url'))) {
		    return false;
	    };

		$requestAction = '/repos/' . $apiRepoOwner . '/' . $apiRepoName . '/issues';

	    $http = new Client([
		    'host' => $apiBase,
		    'scheme' => 'https'
	    ]);

	    $response = $http->post(
	    	$requestAction
		    , $requestJson
		    ,[
		    	'auth' => [
			        'username' => $apiUser
				    , 'password' => $apiToken
			    ]
		    ]
	    );

	    if ($response->isOk()) {
		    return true;
	    }

    	return false;
    }
}
