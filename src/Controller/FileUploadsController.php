<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;
use Cake\Http\Response;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

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
     * @return void|\Cake\Http\Response Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fileUpload = $this->FileUploads->newEntity();

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
     * @param int $fileUploadId The Id of the File to be processed
     *
     * @return Response
     */
    public function autoMerge($fileUploadId)
    {
        $fileUpload = $this->FileUploads->get($fileUploadId, ['contain' => 'CompassUploads']);

        $this->loadComponent('Merge');

        if (!empty($fileUpload->compass_uploads)) {
            $total = 0;
            $fail = 0;
            $success = 0;
            $overall = 0;

            $deleteFail = 0;
            $compassUploads = TableRegistry::get('CompassUploads');

            foreach ($fileUpload->compass_uploads as $compass) {
                $test = $this->Merge->autoMerge($compass->id);

                $overall += 1;

                if ($test) {
                    $merged = $this->Merge->contactUpload($compass->id);
                    $total += 1;

                    if ($merged instanceof Entity) {
                        $success += 1;

                        $delRecord = $compassUploads->get($compass->id);
                        if (!$compassUploads->delete($delRecord)) {
                            $deleteFail += 1;
                        }
                    } else {
                        $fail += 1;
                        $this->log($compass->id . ' Failed Merge.', 'warning');
                    }
                }
            }

            $unsynced = $overall - $total;

            if ($success > 0) {
                $this->Flash->success($success . ' Records Merged of ' . $total . ' Total (' . $unsynced . ' Ignored).');
            }

            if ($fail > 0) {
                $this->Flash->error($fail . ' Records Failed to Merge of ' . $total . ' Total (' . $unsynced . ' Ignored).');
            }

            if ($deleteFail > 0) {
                $this->Flash->error($deleteFail . ' Records Failed to Delete of ' . $success . ' Successful Records.');
            }

            if ($total == 0) {
                $this->Flash->success('No Records to Automatically Sync.');
            }
        }

        return $this->redirect(['action' => 'view', $fileUploadId]);
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
