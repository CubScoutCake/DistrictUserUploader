<?php

namespace App\Controller\Api;

use App\Model\Entity\Contact;
use App\Model\Entity\RoleType;
use App\Model\Table\ContactsTable;
use Cake\ORM\TableRegistry;

/**
 * Class ContactsController
 * @package App\Controller\Api
 *
 * @property ContactsTable $Contacts
 */
class ContactsController extends AppController
{
    /**
     * Setup Config
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Display a set of Applications in the Response
     *
     * @return void
     */
    public function index()
    {
        $this->request->allowMethod('get');

        $contacts = $this->Contacts->find('all', [
            'fields' => [
                'id',
                'membership_number',
                'first_name',
                'last_name',
                'email',
                'address_line_1',
                'address_line_2',
                'city',
                'county',
                'postcode'
            ]
        ]);

        // Set the view vars that have to be serialized.
        $this->set('contacts', $contacts);
        // Specify which view vars JsonView should serialize.
        $this->set('_serialize', ['contacts']);
    }

    /**
     * Display a set of Applications in the Response
     *
     * @return void
     */
    public function new_contact()
    {
        $this->request->allowMethod('get');

        $contacts = $this->Contacts->find('new', [
            'fields' => [
                'id',
                'membership_number',
                'first_name',
                'last_name',
                'email',
                'address_line_1',
                'address_line_2',
                'city',
                'county',
                'postcode'
            ]
        ]);

        // Set the view vars that have to be serialized.
        $this->set('contacts', $contacts);
        // Specify which view vars JsonView should serialize.
        $this->set('_serialize', ['contacts']);
    }

    /**
     * @return \Cake\Http\Response
     */
    public function assign()
    {
        $this->request->allowMethod('post');

        if (!isset($email) || empty($email) || !isset($wpId) || empty($wpId)) {
            $body = $this->request->getData();

            if (array_key_exists('wp_id', $body) && array_key_exists('email', $body)) {
                $email = $body['email'];
                $wpId = $body['wp_id'];

	            $email_contact = $this->Contacts->findByEmail($email, [
		            'fields' => [
			            'id'
		            ]
	            ])->first();

	            $contact = $this->Contacts->get($email_contact->id);

	            $contact->wp_id = $wpId;

	            if ($this->Contacts->save($contact)) {
		            return $this->response->withStatus(202);
	            }
            }
	        return $this->response->withStatus(418);
        }
        return $this->response->withStatus(404, 'Record not Found');
    }
}
