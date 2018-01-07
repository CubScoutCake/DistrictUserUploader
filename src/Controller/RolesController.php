<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[] paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RoleTypes', 'Sections', 'Contacts']
        ];
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
        $this->set('_serialize', ['roles']);
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['RoleTypes', 'Sections']
        ]);

        $this->set('role', $role);
        $this->set('_serialize', ['role']);
    }

    /**
     * Add method
     *
     * @param int $contactId The ID for the Contact Default
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($contactId = null)
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['controller' => 'Contacts', 'action' => 'view', $role->contact_id]);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $roleTypes = $this->Roles->RoleTypes->find(
            'list',
            [
                'keyField' => 'id',
                'valueField' => 'role_type',
                'groupField' => 'section_type.section_type'
            ]
        )->contain(['SectionTypes']);
        $sections = $this->Roles->Sections->find(
            'list',
            [
                'keyField' => 'id',
                'valueField' => 'section',
                'groupField' => 'scout_group.scout_group'
            ]
        ) ->contain(['ScoutGroups']);
        $contacts = $this->Roles->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('role', 'roleTypes', 'sections', 'contacts', 'contactId'));
        $this->set('_serialize', ['role']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $roleTypes = $this->Roles->RoleTypes->find(
            'list',
            [
                'keyField' => 'id',
                'valueField' => 'role_type',
                'groupField' => 'section_type.section_type'
            ]
        )->contain(['SectionTypes']);
        $sections = $this->Roles->Sections->find(
            'list',
            [
                'keyField' => 'id',
                'valueField' => 'section',
                'groupField' => 'scout_group.scout_group'
            ]
        ) ->contain(['ScoutGroups']);
        $contacts = $this->Roles->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('role', 'roleTypes', 'sections', 'contacts'));
        $this->set('_serialize', ['role']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
