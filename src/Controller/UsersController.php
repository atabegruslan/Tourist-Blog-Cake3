<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        // tell Auth not to check authentication when doing the 'register' action
        $this->Auth->allow('register');
    }

    public function login()
    {
        if ($this->Auth->user()) { // if already logged in
            return $this->redirect('/entries/');
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Hello ' . $this->Auth->user('name')));   

                //return $this->redirect($this->Auth->redirectUrl());
                return $this->redirect('/entries/');
            }

            $this->Flash->error('Your username or password is incorrect');
        }
    }

    public function logout()
    {
        $this->Flash->success('Logged out');
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    { 
        if ($this->Auth->user()) { // if already logged in
            return $this->redirect('/entries/');
        }

        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();

            $userData = $this->request->getData();

            if ($userData['password'] === $userData['password_confirm']) { 
                unset($userData['password_confirm']);
                $userData['type'] = 'normal';

                $user = $this->Users->patchEntity($user, $userData);

                if ($this->Users->save($user)) { 
                    $this->Auth->setUser($user->toArray());
                    $this->Flash->success(__('Hello ' . $this->Auth->user('name')));

                    //return $this->redirect($this->Auth->redirectUrl());
                    return $this->redirect('/entries/');
                }
                $this->Flash->error(__('The user has NOT been saved.')); 
            }
            $this->Flash->error(__('Password confirmation failure.')); 
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Entries'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
