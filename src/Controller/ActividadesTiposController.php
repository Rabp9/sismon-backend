<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ActividadesTipos Controller
 *
 * @property \App\Model\Table\ActividadesTiposTable $ActividadesTipos
 * @method \App\Model\Entity\ActividadesTipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActividadesTiposController extends AppController
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
        
        $query = $this->ActividadesTipos->find()->order(['id']);

        if ($search) {
            $query->where([
                'ActividadesTipos.descripcion LIKE' => '%' . $search . '%',
            ]);
        }
        
        if ($estado_id) {
            $query->where(['ActividadesTipos.estado_id' => $estado_id]);
        }
        
        $count = $query->count();
        if (!$itemsPerPage) {
            $itemsPerPage = $count;
        }
        $actividadesTipos = $this->paginate($query, [
            'limit' => $itemsPerPage
        ]);
        $paginate = $this->request->getAttribute('paging')['ActividadesTipos'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('actividadesTipos', 'pagination', 'count'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * GetList method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getList() {
        $actividadesTipos = $this->ActividadesTipos->find()->order('descripcion')
            ->where(['ActividadesTipos.estado_id' => 1]);

        $this->set(compact('actividadesTipos'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * getEnabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getEnabled() {
        $actividadesTipos = $this->ActividadesTipos->find()
            ->where(['estado_id' => 1]);

        $this->set(compact('actividadesTipos'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * View method
     *
     * @param string|null $id Actividades Tipo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $actividadesTipo = $this->ActividadesTipos->get($id);

        $this->set(compact('actividadesTipo'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->request->allowMethod('POST');
        $actividadesTipo = $this->ActividadesTipos->newEntity($this->request->getData());
        $actividadesTipo->estado_id = 1;

        if ($this->ActividadesTipos->save($actividadesTipo)) {
            $message = 'El tipo de actividad fue registrado correctamente';
        } else {
            $message = 'El tipo de actividad no fue registrado correctamente';
            $errors = $actividadesTipo->getErrors();
        }
        $this->set(compact('actividadesTipo', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Edit method
     *
     * @param string|null $id Actividades Tipo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->request->allowMethod('PUT');
        $actividadesTipo = $this->ActividadesTipos->patchEntity($this->ActividadesTipos->get($id), $this->request->getData());
        
        if ($this->ActividadesTipos->save($actividadesTipo)) {
            $message = 'El tipo de actividad fue modificado correctamente';
        } else {
            $message = 'El tipo de actividad no fue modificado correctamente';
            $errors = $actividadesTipo->getErrors();
        }
        $this->set(compact('actividadesTipo', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Delete method
     *
     * @param string|null $id Actividades Tipo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actividadesTipo = $this->ActividadesTipos->get($id);
        if ($this->ActividadesTipos->delete($actividadesTipo)) {
            $this->Flash->success(__('The actividades tipo has been deleted.'));
        } else {
            $this->Flash->error(__('The actividades tipo could not be deleted. Please, try again.'));
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
        $actividadesTipo = $this->ActividadesTipos->get($id);
        $actividadesTipo->estado_id = 1;
        
        if ($this->ActividadesTipos->save($actividadesTipo)) {
            $message = 'El tipo de actividad fue habilitado correctamente';
        } else {
            $message = 'El tipo de actividad no fue habilitado correctamente';
            $errors = $actividadesTipo->getErrors();
        }
        $this->set(compact('actividadesTipo', 'message', 'errors'));
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
        $actividadesTipo = $this->ActividadesTipos->get($id);
        $actividadesTipo->estado_id = 2;
        
        if ($this->ActividadesTipos->save($actividadesTipo)) {
            $message = 'El tipo de actividad fue fue deshabilitado correctamente';
        } else {
            $message = 'El tipo de actividad no fue deshabilitado correctamente';
            $errors = $actividadesTipo->getErrors();
        }
        $this->set(compact('actividadesTipo', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
}
