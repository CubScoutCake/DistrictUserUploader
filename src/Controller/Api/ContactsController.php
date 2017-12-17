<?php

namespace App\Controller\Api;

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
    public function new()
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
     * @param string $email The Email of the User to be Updated
     * @param int $wpId The WordPress ID of the User
     *
     * @return Cake/Http/Response
     */
    public function assign($email, $wpId)
    {
        $this->request->allowMethod('post');

        if (!isset($email) || empty($email) || !isset($wpId) || empty($wpId)) {
            $body = $this->request->getBody();
            $body = json_decode($body);

            if (array_key_exists('wp_id', $body) && array_key_exists('email', $body)) {
                $email = $body['email'];
                $wpId = $body['wp_id'];
            }
        }

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

        return $this->response->withStatus(418);
    }
}
