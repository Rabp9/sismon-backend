<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $search = $this->request->getQuery('search');
        $estado_id = $this->request->getQuery('estado_id');
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $query = $this->Users->find()->order(['Users.id'])->contain('Trabajadores');

        if ($search) {
            $query->where(['OR' => [
                'Users.username LIKE' => '%' . $search . '%'
            ]]);
        }
        
        if ($estado_id) {
            $query->where(['Users.estado_id' => $estado_id]);
        }
        
        $count = $query->count();
        if (!$itemsPerPage) {
            $itemsPerPage = $count;
        }
        $users = $this->paginate($query, [
            'limit' => $itemsPerPage
        ]);
        $paginate = $this->request->getAttribute('paging')['Users'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('users', 'pagination', 'count'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $users = $this->Users->get($id)->contain('Trabajadores');

        $this->set(compact('users'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->request->allowMethod('POST');
        $user = $this->Users->newEntity($this->request->getData());
        $user->estado_id = 1;

        if ($this->Users->save($user)) {
            $message = 'El usuario fue registrado correctamente';
        } else {
            $message = 'El usuario no fue registrado correctamente';
            $errors = $user->getErrors();
        }
        $this->set(compact('user', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->request->allowMethod('PUT');
        $user = $this->Users->patchEntity($this->Users->get($id), $this->request->getData());
        
        if ($this->Users->save($user)) {
            $message = 'El usuario fue modificado correctamente';
        } else {
            $message = 'El usuario no fue modificado correctamente';
            $errors = $user->getErrors();
        }
        $this->set(compact('user', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
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
    
    /**
     * Enable method
     *
     * @param string|null $id Interseccione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable() {
        $this->request->allowMethod('POST');
        $id = $this->request->getData('id');
        $user = $this->Users->get($id);
        $user->estado_id = 1;
        
        if ($this->Users->save($user)) {
            $message = 'El usuario fue habilitado correctamente';
        } else {
            $message = 'El usuario no fue habilitado correctamente';
            $errors = $user->getErrors();
        }
        $this->set(compact('user', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    /**
     * Disable method
     *
     * @param string|null $id Interseccione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disable() {
        $this->request->allowMethod('POST');
        $id = $this->request->getData('id');
        $user = $this->Users->get($id);
        $user->estado_id = 2;
        
        if ($this->Users->save($user)) {
            $message = 'El usuario fue fue deshabilitado correctamente';
        } else {
            $message = 'El usuario no fue deshabilitado correctamente';
            $errors = $user->getErrors();
        }
        $this->set(compact('user', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    public function login() {
        $username = $this->request->getData('username');
        $password = $this->request->getData('password');
        $hasher = new DefaultPasswordHasher();
        
        $user = $this->Users->find()
            ->where(['Users.username' => $username])
            ->first();
        if (!isset($user->id)) {
            $message = "Usuario no encontrado";
        } else {
            if (isset($user->id) && $hasher->check($password, $user->password)) {
                $message = "logueado";
            } else {
                $user = null;
                $message = "Contraseña incorrecta";
            }
        }
        $this->set(compact('user', 'message'));
        $this->viewBuilder()->setOption('serialize', true);
    }
}
