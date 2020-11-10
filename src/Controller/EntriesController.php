<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Entries Controller
 *
 * @property \App\Model\Table\EntriesTable $Entries
 *
 * @method \App\Model\Entity\Entry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // Filter
        $filter_data = $this->request->query;
        $conditions = [];

        foreach ($filter_data as $key => $value) 
        {
            $conditions[] = 'entries.'.$key." like '%".$value."%' ";
        }

        // Paginate the ORM table:
        // $this->paginate = [
        //     'contain' => ['Users', 'Countries' => ['Continents']],
        // ];

        // $entries = $this->paginate($this->Entries);

        // $this->set(compact('entries'));

        // ------------------------------

        // Paginate a query:
        $option = [
            'contain' => ['Users', 'Countries' => ['Continents']],
            'conditions' => $conditions,
        ];

        //$entries = $this->Entries->find('all', $option)->toArray(); 
        //pr($entries);exit;
        $entries = $this->Entries->find('all', $option);

        $this->set('entries', $this->paginate($entries));

        $this->set(compact('filter_data'));
    }

    /**
     * View method
     *
     * @param string|null $id Entry id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entry = $this->Entries->get($id, [
            'contain' => ['Users', 'Countries' => ['Continents']],
        ]);

        $this->set('entry', $entry);
        $this->set('webroot', $this->webroot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entry = $this->Entries->newEntity();

        if ($this->request->is('post')) 
        {
            $data = $this->request->getData();

            $this->upload_image($data);
            $this->upload_video($data);

            $entry = $this->Entries->patchEntity($entry, $data);

            if ($this->Entries->save($entry)) 
            {
                $this->Flash->success(__('The entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The entry could not be saved. Please, try again.'));
        }

        // $users = $this->Entries->Users->find('list'/* , ['limit' => 200] */);
        $user_id = $this->Auth->user('id');

        $countries = $this->Entries->Countries->find('list');

        $this->set(compact('entry', /*'users', */'user_id', 'countries'));
    }

    private function upload_image(&$data)
    {
        if (!empty($data['image']) && $data['image']['tmp_name'])
        {
            if (!preg_match('/image\/*/', $data['image']['type']))
            {
                // error
            }

            $result = $this->Common->upload_images($data['image'], 'image', 'entry');

            if( isset($result['status']) && ($result['status'] == true) )
            {
                $data['img_url'] = $result['params']['path'];
                $data['img_url'] = str_replace("\\",'/',$data['img_url']);
                unset($data['image']);
            }
            else
            {
                // error
            }
        }
    }
    private function upload_video(&$data)
    {
        if (!empty($data['video']) && $data['video']['tmp_name'])
        {
            if (!preg_match('/video\/*/', $data['video']['type']))
            {
                // error
                pr('not vid type');exit;
            }

            $result = $this->Common->upload_file($data['video'], 'video', 'entry');

            if( isset($result['status']) && ($result['status'] == true) )
            {
                $data['vid_url'] = $result['params']['path'];
                $data['vid_url'] = str_replace("\\",'/',$data['vid_url']);
                unset($data['video']);
            }
            else
            {
                // error
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Entry id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $entry = $this->Entries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entry = $this->Entries->patchEntity($entry, $this->request->getData());
            if ($this->Entries->save($entry)) {
                $this->Flash->success(__('The entry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entry could not be saved. Please, try again.'));
        }
        $users = $this->Entries->Users->find('list', ['limit' => 200]);
        $this->set(compact('entry', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entry id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entry = $this->Entries->get($id);
        if ($this->Entries->delete($entry)) {
            $this->Flash->success(__('The entry has been deleted.'));
        } else {
            $this->Flash->error(__('The entry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
