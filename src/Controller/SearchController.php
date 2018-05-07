<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 07/05/2018
 * Time: 12:46
 */

namespace App\Controller;

/**
 * Class SearchController
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 * @property \App\Model\Table\AuthUsersTable $AuthUsers
 * @property \App\Model\Table\RoleTypesTable $RoleTypes
 */

class SearchController extends AppController
{
    /**
     *
     * @return \Cake\Http\Response|null
     */
    public function search()
    {
        if ($this->request->getMethod() <> 'POST') {
            return $this->redirect($this->referer(['controller' => 'Landing', 'action' => 'welcome']));
        }

        $requestData = $this->request->getData();

        if (key_exists('q_text', $requestData)) {
            $searchTerm = $requestData['q_text'];
        }

        if (!isset($searchTerm) || is_null($searchTerm)) {
            return $this->redirect($this->referer(['controller' => 'Landing', 'action' => 'welcome']));
        }

        $this->loadModel('Contacts');
        $contacts = $this->Contacts->find('search', ['search' => $requestData]);

        $this->loadModel('AuthUsers');
        $authUsers = $this->AuthUsers->find('search', ['search' => $requestData]);

        $this->loadModel('RoleTypes');
        $roleTypes = $this->RoleTypes->find('search', ['search' => $requestData, 'contain' => 'SectionTypes']);

        $this->set(compact('contacts', 'authUsers', 'roleTypes'));
    }
}
