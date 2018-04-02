<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Sections Controller
 *
 * @property \App\Model\Table\SectionsTable $Sections
 *
 * @method \App\Model\Entity\Section[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SectionsController extends AppController
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
        $sections = $this->Sections->find('all')->contain(['ScoutGroups'])->where(['ScoutGroups.wp_group_id IS NOT NULL']);

        $this->set('sections', $sections);
        $this->set('_serialize', ['sections']);
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

            if (key_exists('sections', $data)) {
                $data = $data['sections'];

                $successCount = 0;
                $keyCount = 0;
                $count = 0;

                $sectionRefs = $this->Sections->find('list')->toArray();

                foreach ($data as $point) {
                    $count += 1;
                    if (key_exists('wp_section_id', $point) && key_exists('uah_id', $point)) {
                        $keyCount += 1;
                        if (key_exists($point['uah_id'], $sectionRefs)) {
                            $section = $this->Sections->get($point['uah_id']);
                            $section->set('wp_section_id', $point['wp_section_id']);
                            if ($this->Sections->save($section)) {
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
