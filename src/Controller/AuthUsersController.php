<?php
namespace App\Controller;

/**
 * AuthUsers Controller
 *
 * @property \App\Model\Table\AuthUsersTable $AuthUsers
 *
 * @method \App\Model\Entity\AuthUser[] paginate($object = null, array $settings = [])
 */
class AuthUsersController extends AppController
{
	/**
	 * Initialize method
	 */
	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout']);
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $authUsers = $this->paginate($this->AuthUsers);

        $this->set(compact('authUsers'));
        $this->set('_serialize', ['authUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Auth User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $authUser = $this->AuthUsers->get($id, [
            'contain' => []
        ]);

        $this->set('authUser', $authUser);
        $this->set('_serialize', ['authUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authUser = $this->AuthUsers->newEntity();
        if ($this->request->is('post')) {
            $authUser = $this->AuthUsers->patchEntity($authUser, $this->request->getData());
            if ($this->AuthUsers->save($authUser)) {
                $this->Flash->success(__('The auth user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auth user could not be saved. Please, try again.'));
        }
        $this->set(compact('authUser'));
        $this->set('_serialize', ['authUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Auth User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authUser = $this->AuthUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authUser = $this->AuthUsers->patchEntity($authUser, $this->request->getData());
            if ($this->AuthUsers->save($authUser)) {
                $this->Flash->success(__('The auth user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The auth user could not be saved. Please, try again.'));
        }
        $this->set(compact('authUser'));
        $this->set('_serialize', ['authUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Auth User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authUser = $this->AuthUsers->get($id);
        if ($this->AuthUsers->delete($authUser)) {
            $this->Flash->success(__('The auth user has been deleted.'));
        } else {
            $this->Flash->error(__('The auth user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	/**
	 * Login Method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Your username or password is incorrect.');
		}
	}

	/**
	 * Logout Method
	 *
	 * @return \Cake\Http\Response|null
	 */
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}
}
