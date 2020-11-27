<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Trabajadores Controller
 *
 * @property \App\Model\Table\TrabajadoresTable $Trabajadores
 * @method \App\Model\Entity\Trabajadore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrabajadoresController extends AppController
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
        
        $query = $this->Trabajadores->find()->order(['id']);

        if ($search) {
            $query->where(['OR' => [
                'Trabajadores.nombres LIKE' => '%' . $search . '%',
                'Trabajadores.apellido_paterno LIKE' => '%' . $search . '%',
                'Trabajadores.apellido_materno LIKE' => '%' . $search . '%',
                'Trabajadores.dni LIKE' => '%' . $search . '%',
            ]]);
        }
        
        if ($estado_id) {
            $query->where(['Trabajadores.estado_id' => $estado_id]);
        }
        
        $count = $query->count();
        if (!$itemsPerPage) {
            $itemsPerPage = $count;
        }
        $trabajadores = $this->paginate($query, [
            'limit' => $itemsPerPage
        ]);
        $paginate = $this->request->getAttribute('paging')['Trabajadores'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('trabajadores', 'pagination', 'count'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * GetList method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getList() {
        $trabajadores = $this->Trabajadores->find()
            ->where(['Trabajadores.estado_id' => 1])
            ->order('Trabajadores.apellido_paterno');

        $this->set(compact('trabajadores'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    /**
     * GetWithoutUser method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getWithoutUser() {
        $trabajadoresPre = $this->Trabajadores->find()
            ->contain('Users')
            ->where(['Trabajadores.estado_id' => 1])
            ->order('Trabajadores.apellido_paterno');
        $trabajadores = [];
        
        foreach ($trabajadoresPre as $trabajador) {
            if ($trabajador->user === null) {
                $trabajadores[] = $trabajador;
            }
        }

        $this->set(compact('trabajadores'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * getEnabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getEnabled() {
        $this->request->allowMethod(['GET']);
        $trabajadores = $this->Trabajadores->find()
            ->where(['estado_id' => 1]);

        $this->set(compact('trabajadores'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    /**
     * View method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $trabajadores = $this->Trabajadores->get($id);

        $this->set(compact('trabajadores'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->request->allowMethod('POST');
        $trabajador = $this->Trabajadores->newEntity($this->request->getData());
        $trabajador->estado_id = 1;

        if ($this->Trabajadores->save($trabajador)) {
            $message = 'El trabajador fue registrado correctamente';
        } else {
            $message = 'El trabajador no fue registrado correctamente';
            $errors = $trabajador->getErrors();
        }
        $this->set(compact('trabajador', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->request->allowMethod('PUT');
        $trabajador = $this->Trabajadores->patchEntity($this->Trabajadores->get($id), $this->request->getData());
        
        if ($this->Trabajadores->save($trabajador)) {
            $message = 'El trabajador fue modificado correctamente';
        } else {
            $message = 'El trabajador no fue modificado correctamente';
            $errors = $trabajador->getErrors();
        }
        $this->set(compact('trabajador', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
 
    /**
     * Delete method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trabajadore = $this->Trabajadores->get($id);
        if ($this->Trabajadores->delete($trabajadore)) {
            $this->Flash->success(__('The trabajadore has been deleted.'));
        } else {
            $this->Flash->error(__('The trabajadore could not be deleted. Please, try again.'));
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
        $trabajador = $this->Trabajadores->get($id);
        $trabajador->estado_id = 1;
        
        if ($this->Trabajadores->save($trabajador)) {
            $message = 'El trabajador fue habilitado correctamente';
        } else {
            $message = 'El trabajador no fue habilitado correctamente';
            $errors = $trabajador->getErrors();
        }
        $this->set(compact('trabajador', 'message', 'errors'));
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
        $trabajador = $this->Trabajadores->get($id);
        $trabajador->estado_id = 2;
        
        if ($this->Trabajadores->save($trabajador)) {
            $message = 'El trabajador fue fue deshabilitado correctamente';
        } else {
            $message = 'El trabajador no fue deshabilitado correctamente';
            $errors = $trabajador->getErrors();
        }
        $this->set(compact('trabajador', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
}
