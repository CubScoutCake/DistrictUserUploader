<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequestTraces Controller
 *
 * @property \App\Model\Table\RequestTracesTable $RequestTraces
 *
 * @method \App\Model\Entity\RequestTrace[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestTracesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $requestTraces = $this->paginate($this->RequestTraces);

        $this->set(compact('requestTraces'));
    }

    /**
     * View method
     *
     * @param string|null $id Request Trace id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requestTrace = $this->RequestTraces->get($id, [
            'contain' => []
        ]);

        $this->set('requestTrace', $requestTrace);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requestTrace = $this->RequestTraces->newEntity();
        if ($this->request->is('post')) {
            $requestTrace = $this->RequestTraces->patchEntity($requestTrace, $this->request->getData());
            if ($this->RequestTraces->save($requestTrace)) {
                $this->Flash->success(__('The request trace has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request trace could not be saved. Please, try again.'));
        }
        $this->set(compact('requestTrace'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Request Trace id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requestTrace = $this->RequestTraces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestTrace = $this->RequestTraces->patchEntity($requestTrace, $this->request->getData());
            if ($this->RequestTraces->save($requestTrace)) {
                $this->Flash->success(__('The request trace has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request trace could not be saved. Please, try again.'));
        }
        $this->set(compact('requestTrace'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Request Trace id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requestTrace = $this->RequestTraces->get($id);
        if ($this->RequestTraces->delete($requestTrace)) {
            $this->Flash->success(__('The request trace has been deleted.'));
        } else {
            $this->Flash->error(__('The request trace could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
