<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 *
 * @method \App\Model\Entity\Contact[] paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{

    /**
     * Index method
     *
     * @param int $new Whether to just show New Authorised Contacts or Not Contacts
     *
     * @return \Cake\Http\Response|void
     */
    public function index($new = null)
    {
        $this->paginate = [
            'contain' => ['WpRoles']
        ];

        $new = boolval($new);

        if ($new) {
            $this->paginate = [
                'contain' => ['WpRoles'],
                'finder' => 'new'
            ];
        }

        $contacts = $this->paginate($this->Contacts);

        $this->set(compact('contacts'));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * Index method
     *
     * @param int $contactId The ID of the User to be Authorised
     *
     * @return \Cake\Http\Response
     */
    public function authorise($contactId = null)
    {
        if ($this->request->is('get')) {
            $this->paginate = [
                'conditions' => ['validated' => false]
            ];
            $contacts = $this->paginate($this->Contacts);

            $this->set(compact('contacts'));
            $this->set('_serialize', ['contacts']);
        }

        if ($this->request->is('post') && !empty($contactId)) {
            $contact = $this->Contacts->get($contactId);
            $contact->set('validated', true);
            if ($this->Contacts->save($contact)) {
                $this->Flash->success('Contact Authorised');

                return $this->redirect($this->referer(['action' => 'authorise']));
            }
            $this->Flash->error('An Error Occurred');

            return $this->redirect(['action' => 'authorise']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['WpRoles', 'Roles.Sections.ScoutGroups', 'Roles.Sections.SectionTypes', 'Roles.RoleTypes', 'Audits.AuthUsers']
        ]);

        $this->set('contact', $contact);
        $this->set('_serialize', ['contact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $wpRoles = $this->Contacts->WpRoles->find('list', ['limit' => 200]);
        $groups = $this->Contacts->AdminGroups->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'wpRoles', 'groups'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Sections', 'RoleTypes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData(), [
                'associated' => [
                    'Sections',
                    'RoleTypes._joinData',
                    'RoleTypes'
                ]
            ]);
            $contact->setDirty('Sections', true);
            $contact->setDirty('RoleTypes', true);
            $contact->setDirty('RoleTypes._joinData', true);
            if ($this->Contacts->save($contact, [
                'associated' => [
                    'Sections',
                    'RoleTypes._joinData',
                    'RoleTypes'
                ]
            ])) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect($this->referer(['action' => 'view', $contact->id]));
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $wpRoles = $this->Contacts->WpRoles->find('list', ['limit' => 200]);
        $groups = $this->Contacts->AdminGroups->find('list', ['limit' => 200]);
        $roleTypes = $this->Contacts->RoleTypes->find('list', ['limit' => 200]);
        $sectionTypes = $this->Contacts->Sections->SectionTypes->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'wpRoles', 'groups', 'roleTypes', 'sectionTypes'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
