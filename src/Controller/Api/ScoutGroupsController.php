<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * ScoutGroups Controller
 *
 * @property \App\Model\Table\ScoutGroupsTable $ScoutGroups
 *
 * @method \App\Model\Entity\ScoutGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScoutGroupsController extends AppController
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
     */
    public function index()
    {
        $groups = $this->ScoutGroups->find('all');

        $this->set('groups', $groups);
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $id Scout Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scoutGroup = $this->ScoutGroups->get($id, [
            'contain' => ['Sections']
        ]);

        $this->set('scoutGroup', $scoutGroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scoutGroup = $this->ScoutGroups->newEntity();
        if ($this->request->is('post')) {
            $scoutGroup = $this->ScoutGroups->patchEntity($scoutGroup, $this->request->getData());
            if ($this->ScoutGroups->save($scoutGroup)) {
                $this->Flash->success(__('The scout group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scout group could not be saved. Please, try again.'));
        }
        $this->set(compact('scoutGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scout Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scoutGroup = $this->ScoutGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scoutGroup = $this->ScoutGroups->patchEntity($scoutGroup, $this->request->getData());
            if ($this->ScoutGroups->save($scoutGroup)) {
                $this->Flash->success(__('The scout group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scout group could not be saved. Please, try again.'));
        }
        $this->set(compact('scoutGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scout Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scoutGroup = $this->ScoutGroups->get($id);
        if ($this->ScoutGroups->delete($scoutGroup)) {
            $this->Flash->success(__('The scout group has been deleted.'));
        } else {
            $this->Flash->error(__('The scout group could not be deleted. Please, try again.'));
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

            if (key_exists('groups', $data)) {
                $data = $data['groups'];

                $successCount = 0;
                $keyCount = 0;
                $count = 0;

                $groupRefs = $this->ScoutGroups->find('list')->toArray();

                foreach ($data as $point) {
                    $count += 1;
                    if (key_exists('wp_group_id', $point) && key_exists('uah_name', $point)) {
                        $keyCount += 1;
                        if (in_array($point['uah_name'], $groupRefs)) {
                            $group = $this->ScoutGroups->find('all')->where(['group_alias' => $point['uah_name']])->first();
                            $group->set('wp_group_id', $point['wp_group_id']);
                            if ($this->ScoutGroups->save($group)) {
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

                return $this->response->withStatus(201, 'Update Successful.');
            }

            return $this->response->withStatus(400, 'Malformed Payload');
        } else {
            return $this->response->withStatus(401, 'Method Unauthorised');
        }
    }
}
