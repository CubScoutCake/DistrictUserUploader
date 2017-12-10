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
            ]
        ]);

        // Set the view vars that have to be serialized.
        $this->set('contacts', $contacts);
        // Specify which view vars JsonView should serialize.
        $this->set('_serialize', ['contacts']);
    }
}
