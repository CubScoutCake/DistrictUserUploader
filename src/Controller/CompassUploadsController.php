<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * CompassUploads Controller
 *
 * @property \App\Model\Table\CompassUploadsTable $CompassUploads
 *
 * @method \App\Model\Entity\CompassUpload[] paginate($object = null, array $settings = [])
 */
class CompassUploadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FileUploads']
        ];
        $compassUploads = $this->paginate($this->CompassUploads);

        $this->set(compact('compassUploads'));
        $this->set('_serialize', ['compassUploads']);
    }

    /**
     * View method
     *
     * @param string|null $id Compass Upload id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $compassUpload = $this->CompassUploads->get($id, [
            'contain' => ['FileUploads']
        ]);

        $this->set('compassUpload', $compassUpload);
        $this->set('_serialize', ['compassUpload']);
    }

    /**
     * @param int $fileId The ID of the File to be Imported.
     *
     * @return \Cake\Http\Response|null
     */
    public function import($fileId)
    {
        $files = TableRegistry::get('FileUploads');
        $file = $files->get($fileId);

        $data = $this->CompassUploads->importCsv('/Users/jacob/Downloads/CompassExport-3.csv');

        $entities = $this->CompassUploads->newEntities($data);

        $fail = 0;
        $total = 1;

        foreach ($entities as $entity) {
            $total += 1;
            $entity->file_upload_id = $fileId;
            // Save entity
            if (!$this->CompassUploads->save($entity)) {
                $fail += 1;
            }
        }

        if ($fail > 0) {
            $errorText = $fail . ' records failed of ' . $total . ' total records.';
            $this->Flash->error($errorText);
        } else {
            $successText = $total . ' records added successfully.';
            $this->Flash->success($successText);
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $compassUpload = $this->CompassUploads->newEntity();
        if ($this->request->is('post')) {
            $compassUpload = $this->CompassUploads->patchEntity($compassUpload, $this->request->getData());
            if ($this->CompassUploads->save($compassUpload)) {
                $this->Flash->success(__('The compass upload has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The compass upload could not be saved. Please, try again.'));
        }
        $fileUploads = $this->CompassUploads->FileUploads->find('list', ['limit' => 200]);
        $this->set(compact('compassUpload', 'fileUploads'));
        $this->set('_serialize', ['compassUpload']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Compass Upload id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $compassUpload = $this->CompassUploads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compassUpload = $this->CompassUploads->patchEntity($compassUpload, $this->request->getData());
            if ($this->CompassUploads->save($compassUpload)) {
                $this->Flash->success(__('The compass upload has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The compass upload could not be saved. Please, try again.'));
        }
        $fileUploads = $this->CompassUploads->FileUploads->find('list', ['limit' => 200]);
        $this->set(compact('compassUpload', 'fileUploads'));
        $this->set('_serialize', ['compassUpload']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Compass Upload id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $compassUpload = $this->CompassUploads->get($id);
        if ($this->CompassUploads->delete($compassUpload)) {
            $this->Flash->success(__('The compass upload has been deleted.'));
        } else {
            $this->Flash->error(__('The compass upload could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
