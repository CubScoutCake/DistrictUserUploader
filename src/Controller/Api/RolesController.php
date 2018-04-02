<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use App\Model\Entity\Role;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
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
     * Index method
     *
     * @return \Cake\Http\Response|void
     *
     */
    public function index()
    {
        $roles = $this->Roles
            ->find('all')
            ->contain(['RoleTypes', 'Sections.ScoutGroups', 'Contacts']);

        $placements = [];

        foreach ($roles as $role) {
            /**
             * @var Role $role
             */
            $placement = [
                'id' => $role->id,
                'placement_id' => $role->wp_placement_id,
                'user_id' => $role->contact->wp_id,
                'role_id' => $role->role_type->wp_role_id,
                'section_id' => $role->section->wp_section_id,
                'group_id' => $role->section->scout_group->wp_group_id,
            ];

            if (!is_null($placement['user_id']) &&
                !is_null($placement['section_id']) &&
                !is_null($placement['group_id']) &&
                !is_null($placement['role_id'])
            ) {
                array_push($placements, $placement);
            }
        }

        $this->set(compact('placements'));
        $this->set('_serialize', ['placements']);
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
            'contain' => ['RoleTypes', 'Sections', 'Contacts']
        ]);

        $this->set('role', $role);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $roleTypes = $this->Roles->RoleTypes->find('list', ['limit' => 200]);
        $sections = $this->Roles->Sections->find('list', ['limit' => 200]);
        $contacts = $this->Roles->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('role', 'roleTypes', 'sections', 'contacts'));
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
        $roleTypes = $this->Roles->RoleTypes->find('list', ['limit' => 200]);
        $sections = $this->Roles->Sections->find('list', ['limit' => 200]);
        $contacts = $this->Roles->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('role', 'roleTypes', 'sections', 'contacts'));
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

    /**
     * Respond
     *
     * @return \Cake\Http\Response
     */
    public function send()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (key_exists('placements', $data)) {
                $data = $data['placements'];

                $successCount = 0;
                $keyCount = 0;
                $count = 0;

                $roleRefs = $this->Roles->find('all')
                    ->contain(['RoleTypes', 'Sections', 'Contacts'])
                    ->toArray();

                $placementRefs = [];
                foreach ($roleRefs as $role) {
                    $roleType = $role['role_type'];
                    $section = $role['section'];
                    $contact = $role['contact'];

                    if (!is_null($roleType['wp_role_id']) && !is_null($section['wp_section_id']) && !is_null($contact['wp_id'])) {
                        $ref = $roleType['wp_role_id'] . '-' . $section['wp_section_id'] . '-' . $contact['wp_id'];
                        $placementRefs[$role['id']] = $ref;
                    }
                }

                foreach ($data as $point) {
                    $count += 1;
                    if (key_exists('wp_placement_id', $point) && key_exists('user_id', $point) && key_exists('role_id', $point) && key_exists('section_id', $point)) {
                        $keyCount += 1;
                        $reference = $point['role_id'] . '-' . $point['section_id'] . '-' . $point['user_id'];
                        if (in_array($reference, $placementRefs)) {
                            $section = $this->Roles->find('all')->where([
                                    'RoleTypes.wp_role_id' => $point['role_id'],
                                    'Contacts.wp_id' => $point['user_id'],
                                    'Sections.wp_section_id' => $point['section_id']
                                ])
                                ->contain(['RoleTypes', 'Contacts', 'Sections'])
                                ->first();
                            $section->set('wp_placement_id', $point['wp_placement_id']);
                            if ($this->Roles->save($section)) {
                                $successCount += 1;
                            }
                        }
                    }
                }

                $responseArray = [
                    'success' => $successCount,
                    'correct_keys' => $keyCount,
                    'total' => $count
                ];

                $this->set('counts', $responseArray);
                $this->set('_serialize', ['counts']);

                return $this->response->withStatus(201, $successCount . ' Updates Successful.');
            }

            return $this->response->withStatus(400, 'Malformed Payload');
        } else {
            return $this->response->withStatus(401, 'Method Unauthorised');
        }
    }
}
