<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

/**
 * FileUploads Controller
 *
 * @property \App\Model\Table\FileUploadsTable $FileUploads
 *
 * @method \App\Model\Entity\FileUpload[] paginate($object = null, array $settings = [])
 */
class FileUploadsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AuthUsers']
        ];
        $fileUploads = $this->paginate($this->FileUploads);

        $this->set(compact('fileUploads'));
        $this->set('_serialize', ['fileUploads']);
    }

    /**
     * View method
     *
     * @param string|null $id File Upload id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fileUpload = $this->FileUploads->get($id, [
            'contain' => ['AuthUsers', 'CompassUploads']
        ]);

        $this->set('fileUpload', $fileUpload);
        $this->set('_serialize', ['fileUpload']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fileUpload = $this->FileUploads->newEntity();

        /*[
		    'name' => 'conference_schedule.pdf',
		    'type' => 'application/pdf',
		    'tmp_name' => 'C:/WINDOWS/TEMP/php1EE.tmp',
		    'error' => 0, // On Windows this can be a string.
		    'size' => 41737,
	    ];*/

        if ($this->request->is('post')) {
            $fileMeta = $this->request->getData('file_name');

            $file = new File($fileMeta['tmp_name'], false);
            $plainString = $fileMeta['name'] . 'FILE UPLOAD' . $fileUpload->id;
            $b64 = base64_encode($plainString);
            $path = WWW_ROOT . 'files' . DS . 'FileUploads' . DS . $b64;

            $dir = new Folder();
            $dir->create($path);
            $dir->chmod($path, 0755, true);

            $file->copy($path . DS . $fileMeta['name']);

            $fileUpload->file_path = $path;
            $fileUpload->file_name = $fileMeta['name'];
            $fileUpload->auth_user_id = $this->Auth->user('id');

            //$fileUpload = $this->FileUploads->patchEntity($fileUpload, $this->request->getData());

            if ($this->FileUploads->save($fileUpload)) {
                $this->Flash->success(__('The file upload has been saved.'));

                return $this->redirect(['controller' => 'CompassUploads', 'action' => 'import', $fileUpload->id]);
            }
            $this->Flash->error(__('The file upload could not be saved. Please, try again.'));
        }
        $this->set(compact('fileUpload'));
        $this->set('_serialize', ['fileUpload']);
    }

    /**
     * Edit method
     *
     * @param string|null $id File Upload id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fileUpload = $this->FileUploads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fileUpload = $this->FileUploads->patchEntity($fileUpload, $this->request->getData());
            if ($this->FileUploads->save($fileUpload)) {
                $this->Flash->success(__('The file upload has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file upload could not be saved. Please, try again.'));
        }
        $authUsers = $this->FileUploads->AuthUsers->find('list', ['limit' => 200]);
        $this->set(compact('fileUpload', 'authUsers'));
        $this->set('_serialize', ['fileUpload']);
    }

    /**
     * Delete method
     *
     * @param string|null $id File Upload id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fileUpload = $this->FileUploads->get($id);
        if ($this->FileUploads->delete($fileUpload)) {
            $this->Flash->success(__('The file upload has been deleted.'));
        } else {
            $this->Flash->error(__('The file upload could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
