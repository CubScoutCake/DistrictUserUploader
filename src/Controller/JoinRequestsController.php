<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JoinRequests Controller
 *
 * @property \App\Model\Table\JoinRequestsTable $JoinRequests
 *
 * @method \App\Model\Entity\JoinRequest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JoinRequestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['JoinStatuses']
        ];
        $joinRequests = $this->paginate($this->JoinRequests);

        $this->set(compact('joinRequests'));
    }

    /**
     * View method
     *
     * @param string|null $id Join Request id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $joinRequest = $this->JoinRequests->get($id, [
            'contain' => ['JoinStatuses', 'Sections']
        ]);

        $this->set('joinRequest', $joinRequest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $joinRequest = $this->JoinRequests->newEntity();
        if ($this->request->is('post')) {
            $joinRequest = $this->JoinRequests->patchEntity($joinRequest, $this->request->getData());
            if ($this->JoinRequests->save($joinRequest)) {
                $this->Flash->success(__('The join request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join request could not be saved. Please, try again.'));
        }
        $joinStatuses = $this->JoinRequests->JoinStatuses->find('list', ['limit' => 200]);
        $sections = $this->JoinRequests->Sections->find('list', ['limit' => 200]);
        $this->set(compact('joinRequest', 'joinStatuses', 'sections'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Join Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $joinRequest = $this->JoinRequests->get($id, [
            'contain' => ['Sections']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $joinRequest = $this->JoinRequests->patchEntity($joinRequest, $this->request->getData());
            if ($this->JoinRequests->save($joinRequest)) {
                $this->Flash->success(__('The join request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join request could not be saved. Please, try again.'));
        }
        $joinStatuses = $this->JoinRequests->JoinStatuses->find('list', ['limit' => 200]);
        $sections = $this->JoinRequests->Sections->find('list', ['limit' => 200]);
        $this->set(compact('joinRequest', 'joinStatuses', 'sections'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Join Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $joinRequest = $this->JoinRequests->get($id);
        if ($this->JoinRequests->delete($joinRequest)) {
            $this->Flash->success(__('The join request has been deleted.'));
        } else {
            $this->Flash->error(__('The join request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
