<?php
namespace App\Controller\Api;

use Cake\ORM\TableRegistry;

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
	    $this->request->allowMethod('get');

	    $joinRequests = $this->JoinRequests->find('all', [
		    'contain' => ['JoinStatuses'],
		    'fields' => [
			    'id',
			    'JoinStatuses.join_status',
			    'created',
			    'modified',
		    ]
	    ]);

	    // Set the view vars that have to be serialized.
	    $this->set('joinRequests', $joinRequests);
	    // Specify which view vars JsonView should serialize.
	    $this->set('_serialize', ['joinRequests']);
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
    public function young()
    {
	    $this->request->allowMethod('post');

	    if ($this->request->is('post')) {
		    $body = $this->request->getData();

		    if ( array_key_exists( 'contact_email', $body ) && array_key_exists('section_type_id', $body) ) {

			    $statuses = TableRegistry::get('JoinStatuses');
			    $firstJoinStatusId = $statuses->find()->where([
				    'join_status' => 'Assigned to Section'
			    ])->firstOrFail();
			    $otherJoinStatusId = $statuses->find()->where([
				    'join_status' => 'Fallback Section'
			    ])->firstOrFail();

			    $sectionArray = [];

			    if ( array_key_exists('sections', $body )) {

				    foreach ( $body['sections'] as $order => $section_id ) {

					    if ( $order == 1 ) {
						    $joinStatus = $firstJoinStatusId;
					    } else {
						    $joinStatus = $otherJoinStatusId;
					    }

					    $sectionAssociated = [
						    'id' => $section_id,
						    '_joinData' => [
							    'join_status_id' => $joinStatus->id,
							    'section_order' => $order
						    ]
					    ];
					    array_push($sectionArray, $sectionAssociated);
				    }

			    } else {
				    $sections = $this->JoinRequests->Sections->find()->where([
					    'join_order <=' => 3,
					    'section_type_id' => $body['section_type_id']
				    ]);

				    foreach ( $sections as $section ) {

					    if ( $section->join_order == 1 ) {
						    $joinStatus = $firstJoinStatusId;
					    } else {
						    $joinStatus = $otherJoinStatusId;
					    }

					    $sectionAssociated = [
						    'id' => $section->id,
						    '_joinData' => [
							    'join_status_id' => $joinStatus->id,
							    'section_order' => $section->join_order
						    ]
					    ];
					    array_push($sectionArray, $sectionAssociated);
				    }
			    }

			    $status = $this->JoinRequests->JoinStatuses->find()->where(['join_status' => 'Received'])->firstOrFail();
			    $baseData = [
				    'young_person' => true,
				    'join_status_id' => $status->id,
				    'sections' => $sectionArray
			    ];

			    $accepted_keys = [
			    	'contact_email',
				    'parent_first_name',
				    'parent_last_name',
				    'date_of_birth',
				    'contact_phone',
				    'young_person_first_name',
				    'young_person_last_name',
			    ];

			    foreach ( $body as $key => $value ) {
			    	if ( in_array( $key, $accepted_keys )) {
			    		$baseData[$key] = $value;
				    }
			    }

			    $status_data = array_merge($body, $baseData);
			    $joinRequest = $this->JoinRequests->newEntity($baseData, [
				    'associated' => ['Sections._joinData', 'Sections']
			    ]);

			    if ($this->JoinRequests->save($joinRequest)) {

				    return $this->response->withStatus( 201, 'Request Successfully Created' );
			    }
		    }
	    }
	    return $this->response->withStatus(400, 'Request Malformed');
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
