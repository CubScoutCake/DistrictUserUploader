<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * JoinRequestsSections Controller
 *
 * @property \App\Model\Table\JoinRequestsSectionsTable $JoinRequestsSections
 *
 * @method \App\Model\Entity\JoinRequestsSection[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JoinRequestsSectionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sections', 'JoinRequests']
        ];
        $joinRequestsSections = $this->paginate($this->JoinRequestsSections);

        $this->set(compact('joinRequestsSections'));
    }

    /**
     * View method
     *
     * @param string|null $id Join Requests Section id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $joinRequestsSection = $this->JoinRequestsSections->get($id, [
            'contain' => ['Sections', 'JoinRequests']
        ]);

        $this->set('joinRequestsSection', $joinRequestsSection);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $joinRequestsSection = $this->JoinRequestsSections->newEntity();
        if ($this->request->is('post')) {
            $joinRequestsSection = $this->JoinRequestsSections->patchEntity($joinRequestsSection, $this->request->getData());
            if ($this->JoinRequestsSections->save($joinRequestsSection)) {
                $this->Flash->success(__('The join requests section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join requests section could not be saved. Please, try again.'));
        }
        $sections = $this->JoinRequestsSections->Sections->find('list', ['limit' => 200]);
        $joinRequests = $this->JoinRequestsSections->JoinRequests->find('list', ['limit' => 200]);
        $this->set(compact('joinRequestsSection', 'sections', 'joinRequests'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Join Requests Section id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $joinRequestsSection = $this->JoinRequestsSections->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $joinRequestsSection = $this->JoinRequestsSections->patchEntity($joinRequestsSection, $this->request->getData());
            if ($this->JoinRequestsSections->save($joinRequestsSection)) {
                $this->Flash->success(__('The join requests section has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The join requests section could not be saved. Please, try again.'));
        }
        $sections = $this->JoinRequestsSections->Sections->find('list', ['limit' => 200]);
        $joinRequests = $this->JoinRequestsSections->JoinRequests->find('list', ['limit' => 200]);
        $this->set(compact('joinRequestsSection', 'sections', 'joinRequests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Join Requests Section id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $joinRequestsSection = $this->JoinRequestsSections->get($id);
        if ($this->JoinRequestsSections->delete($joinRequestsSection)) {
            $this->Flash->success(__('The join requests section has been deleted.'));
        } else {
            $this->Flash->error(__('The join requests section could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
