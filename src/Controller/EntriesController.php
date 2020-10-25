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
        $this->paginate = [
            //'fields' => ["Users.*"],
            'contain' => ['Users', 'Countries'],
            // 'joins' => [
            //     [
            //         'table' => 'countries',
            //         'alias' => 'Countries',
            //         'type' => 'left',
            //         'conditions' => [
            //             'Entries.country_id = Countries.id',
            //         ],
            //     ],
            // ],
        ];

        $entries = $this->paginate($this->Entries);

        $this->set(compact('entries'));
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
            'contain' => ['Users'],
        ]);

        $this->set('entry', $entry);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $entry = $this->Entries->newEntity();
        if ($this->request->is('post')) {
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
