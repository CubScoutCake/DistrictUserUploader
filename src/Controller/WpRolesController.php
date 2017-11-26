<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WpRoles Controller
 *
 * @property \App\Model\Table\WpRolesTable $WpRoles
 *
 * @method \App\Model\Entity\WpRole[] paginate($object = null, array $settings = [])
 */
class WpRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $wpRoles = $this->paginate($this->WpRoles);

        $this->set(compact('wpRoles'));
        $this->set('_serialize', ['wpRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Wp Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wpRole = $this->WpRoles->get($id, [
            'contain' => ['Contact']
        ]);

        $this->set('wpRole', $wpRole);
        $this->set('_serialize', ['wpRole']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wpRole = $this->WpRoles->newEntity();
        if ($this->request->is('post')) {
            $wpRole = $this->WpRoles->patchEntity($wpRole, $this->request->getData());
            if ($this->WpRoles->save($wpRole)) {
                $this->Flash->success(__('The wp role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wp role could not be saved. Please, try again.'));
        }
        $this->set(compact('wpRole'));
        $this->set('_serialize', ['wpRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Wp Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wpRole = $this->WpRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wpRole = $this->WpRoles->patchEntity($wpRole, $this->request->getData());
            if ($this->WpRoles->save($wpRole)) {
                $this->Flash->success(__('The wp role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wp role could not be saved. Please, try again.'));
        }
        $this->set(compact('wpRole'));
        $this->set('_serialize', ['wpRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Wp Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wpRole = $this->WpRoles->get($id);
        if ($this->WpRoles->delete($wpRole)) {
            $this->Flash->success(__('The wp role has been deleted.'));
        } else {
            $this->Flash->error(__('The wp role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
