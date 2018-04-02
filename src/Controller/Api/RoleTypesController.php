<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * RoleTypes Controller
 *
 * @property \App\Model\Table\RoleTypesTable $RoleTypes
 *
 * @method \App\Model\Entity\RoleType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoleTypesController extends AppController
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
        $roles = $this->RoleTypes->find('all');

        $this->set('roles', $roles);
        $this->set('_serialize', ['roles']);
    }

    /**
     * @param int $wp_role_id The ID to be Checked
     *
     * @return null|\Cake\Http\Response
     */
    public function check($wp_role_id)
    {
        $role = $this->RoleTypes->find()->where(['wp_role_id' => $wp_role_id]);

        $count = $role->count();

        if ($count == 1) {
            $roles = [
                $role
            ];

            $this->set('roles', $roles);
            $this->set('_serialize', ['roles']);
        } else {
            return $this->response->withStatus(204, 'Record not available');
        }
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

            if (key_exists('roles', $data)) {
                $data = $data['roles'];

                $successCount = 0;
                $keyCount = 0;
                $count = 0;

                $roleIDs = $this->RoleTypes->find('list')->toArray();

                foreach ($data as $point) {
                    $count += 1;
                    if (key_exists('wp_role_id', $point) && key_exists('uah_id', $point)) {
                        $keyCount += 1;
                        if (key_exists($point['uah_id'], $roleIDs)) {
                            $roleType = $this->RoleTypes->get($point['uah_id']);
                            $roleType->set('wp_role_id', $point['wp_role_id']);
                            if ($this->RoleTypes->save($roleType)) {
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
