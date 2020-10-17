<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Intersecciones Controller
 *
 * @property \App\Model\Table\InterseccionesTable $Intersecciones
 * @method \App\Model\Entity\Interseccione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InterseccionesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->request->allowMethod(['GET']);
        $intersecciones = $this->Intersecciones->find();

        $this->set(compact('intersecciones'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * getEnabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getEnabled() {
        $this->request->allowMethod(['GET']);
        $intersecciones = $this->Intersecciones->find()
            ->where(['estado_id' => 1]);

        $this->set(compact('intersecciones'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * getDisabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getDisabled() {
        $this->request->allowMethod(['GET']);
        $intersecciones = $this->Intersecciones->find()
            ->where(['estado_id' => 2]);

        $this->set(compact('intersecciones'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * View method
     *
     * @param string|null $id Interseccione id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->request->allowMethod(['GET']);
        $interseccion = $this->Intersecciones->get($id);

        $this->set(compact('interseccion'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->request->allowMethod("POST");
        $interseccion = $this->Intersecciones->newEntity($this->request->getData());

        if ($this->Intersecciones->save($interseccion)) {
            $message = 'La intersección fue registrada correctamente';
        } else {
            $message = 'La intersección no fue registrada correctamente';
            $errors = $interseccion->getErrors();
        }
        $this->set(compact('interseccion', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Edit method
     *
     * @param string|null $id Interseccione id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->request->allowMethod('PUT');
        $interseccion = $this->Intersecciones->patchEntity($this->Intersecciones->get($id), $this->request->getData());
        
        if ($this->Intersecciones->save($interseccion)) {
            $message = 'La intersección fue modificada correctamente';
        } else {
            $message = 'La intersección no fue modificada correctamente';
            $errors = $interseccion->getErrors();
        }
        $this->set(compact('interseccion', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
 
    /**
     * Enable method
     *
     * @param string|null $id Interseccione id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enable() {
        $this->request->allowMethod(['POST']);
        $id = $this->request->getData('id');
        $interseccion = $this->Intersecciones->get($id);
        $interseccion->estado_id = 1;
        
        if ($this->Intersecciones->save($interseccion)) {
            $message = 'La intersección fue habilitada correctamente';
        } else {
            $message = 'La intersección no fue habilitada correctamente';
            $errors = $interseccion->getErrors();
        }
        $this->set(compact('interseccion', 'message', 'errors'));
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
        $this->request->allowMethod(['POST']);
        $id = $this->request->getData('id');
        $interseccion = $this->Intersecciones->get($id);
        $interseccion->estado_id = 2;
        
        if ($this->Intersecciones->save($interseccion)) {
            $message = 'La intersección fue deshabilitada correctamente';
        } else {
            $message = 'La intersección no fue deshabilitada correctamente';
            $errors = $interseccion->getErrors();
        }
        $this->set(compact('interseccion', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
}
