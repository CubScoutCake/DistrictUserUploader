<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JoinStatuses Controller
 *
 * @property \App\Model\Table\JoinStatusesTable $JoinStatuses
 *
 * @method \App\Model\Entity\JoinStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JoinStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $joinStatuses = $this->paginate($this->JoinStatuses);

        $this->set(compact('joinStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Join Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $joinStatus = $this->JoinStatuses->get($id, [
            'contain' => ['JoinRequests']
        ]);

        $this->set('joinStatus', $joinStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $joinStatus = $this->JoinStatuses->newEntity();
        if ($this->request->is('post')) {
            $joinStatus = $this->JoinStatuses->patchEntity($joinStatus, $this->request->getData());
            if ($this->JoinStatuses->save($joinStatus)) {
                $this->Flash->success(__('The join status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join status could not be saved. Please, try again.'));
        }
        $this->set(compact('joinStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Join Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $joinStatus = $this->JoinStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $joinStatus = $this->JoinStatuses->patchEntity($joinStatus, $this->request->getData());
            if ($this->JoinStatuses->save($joinStatus)) {
                $this->Flash->success(__('The join status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join status could not be saved. Please, try again.'));
        }
        $this->set(compact('joinStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Join Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $joinStatus = $this->JoinStatuses->get($id);
        if ($this->JoinStatuses->delete($joinStatus)) {
            $this->Flash->success(__('The join status has been deleted.'));
        } else {
            $this->Flash->error(__('The join status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
