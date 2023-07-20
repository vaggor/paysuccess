<?php
declare(strict_types=1);
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{


    public function login()
    {
        /*$usersModel = $this->loadModel('Users');
        $pass_hash = $usersModel->hashPass('123');
        print_r($pass_hash);exit;*/
        $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->set('Username or password is incorrect.', ['element' => 'error']);
            }
        }
    }


    public function logout(){
        return $this->redirect($this->Auth->logout());
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
       /* $this->paginate = [
            'contain' => ['Statuses', 'Usergroups'],
        ];*/
        $users = $this->Users->getUsers();
        //$list_statuses = $this->Users->Statuses->listStatuses();
        //print_r($users);exit;
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
            'contain' => ['Statuses', 'Usergroups'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function newUser()
    {
        $merchantsTbl = TableRegistry::get('Merchants');
        $listMerchants = $merchantsTbl->listMerchants();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['password'] = $this->Users->hashPass($data['password']);
            $user = $this->Users->patchEntity($user, $data);
            //print_r($data);exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user','listMerchants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editUser($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        //print_r($user);exit;
        $merchantsTbl = TableRegistry::get('Merchants');
        $listMerchants = $merchantsTbl->listMerchants();

        if ($this->request->is(['patch', 'post', 'put'])) {
            //print_r($this->request->getData());exit;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            //print_r($this->request->getData());exit;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'listMerchants'));
    }





    public function activateUser($id = null){
        $status_id = 4;
        $activate_user = $this->Users->updateStatus($id,$status_id);
        if($activate_user){
            $this->Flash->success(__('The user has been activated.'));
        }
        else{
            $this->Flash->error(__('The user could not be activated. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }



    public function deactivateUser($id = null){
        $status_id = 3;
        $activate_user = $this->Users->updateStatus($id,$status_id);
        if($activate_user){
            $this->Flash->success(__('The user has been deactivated.'));
        }
        else{
            $this->Flash->error(__('The user could not be deactivated. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }



    public function deleteUser($id = null){
        $delete_user = $this->Users->deleteUser($id);
        if($delete_user){
            $this->Flash->success(__('The user has been deleted.'));
        }
        else{
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }





    public function userChangePassword()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //print_r($data);exit;
            $sess = $this->request->getSession()->read('Auth.User');
            $user = $this->Users->patchEntity($user, $data);
            //$user['id'] = $sess['id'];

            $pass = $this->Users->hashPass($data['password']);
            //$cpass = $this->Users->hashPass($data['cpass']);
            //$opass = $this->UsersTable->hashPass($data['opass']);
            //print_r(array($pass,$cpass));exit;
            if($data['password'] == $data['cpass']){
                $update_res = $this->Users->updatePassword($sess['id'],$pass);
                if($update_res){
                    $this->Flash->success(__('Password has been changed.'));
                }
                else{
                    $this->Flash->error(__('Password could not be change.'));
                }
            }
            else{
                $this->Flash->error(__('Password does not match'));
            }
        }
        return $this->redirect($this->referer());
    }





    public function adminChangePassword()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //print_r($data);exit;
            $sess = $this->request->getSession()->read('Auth.User');
            $user = $this->Users->patchEntity($user, $data);
            //$user['id'] = $sess['id'];

            $pass = $this->Users->hashPass($data['password']);
            //$cpass = $this->Users->hashPass($data['cpass']);
            //$opass = $this->UsersTable->hashPass($data['opass']);
            //print_r(array($pass,$cpass));exit;
            if($data['password'] == $data['cpass']){
                $update_res = $this->Users->updatePassword($data['id'],$pass);
                if($update_res){
                    $this->Flash->success(__('Password has been changed.'));
                }
                else{
                    $this->Flash->error(__('Password could not be change.'));
                }
            }
            else{
                $this->Flash->error(__('Password does not match'));
            }
        }
        return $this->redirect($this->referer());
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
