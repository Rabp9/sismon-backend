<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Actividades Controller
 *
 * @property \App\Model\Table\ActividadesTable $Actividades
 * @method \App\Model\Entity\Actividade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActividadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $search = $this->request->getQuery('search');
        $estado_id =  explode(",", $this->request->getQuery ('estado_id'));
        $itemsPerPage = $this->request->getQuery('itemsPerPage');
        
        $query = $this->Actividades->find()->order(['Actividades.id'])
            ->contain(['ActividadesTipos', 'Trabajadores', 'ActividadesInterseccionesDetalles', 'Tareas' => function(\Cake\ORM\Query $q) {
                return $q->where(['Tareas.estado_id IN' => [1, 3]]);
            }]);

        if ($search) {
            $query->where([
                'Actividades.descripcion LIKE' => '%' . $search . '%'
            ]);
        }
        
        if ($estado_id) {
            $query->where(['Actividades.estado_id IN' => $estado_id]);
        }
        
        $count = $query->count();
        if (!$itemsPerPage) {
            $itemsPerPage = $count;
        }
        $actividades = $this->paginate($query, [
            'limit' => $itemsPerPage
        ]);
        $paginate = $this->request->getAttribute('paging')['Actividades'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('actividades', 'pagination', 'count'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * getEnabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getEnabled() {
        $this->request->allowMethod(['GET']);
        $actividades = $this->Actividades->find()
            ->where(['estado_id' => 1]);

        $this->set(compact('actividades'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    /**
     * getPendientes method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getPendientes() {
        $actividadesTipoId = $this->request->getParam('actividadesTipoId');
        $actividades = $this->Actividades->find()
            ->contain('Tareas')
            ->distinct('Actividades.id')
            ->where([
                'Actividades.estado_id' => 1,
                'Actividades.actividades_tipo_id' => $actividadesTipoId
            ]);

        $actividades->matching('Tareas', function(\Cake\ORM\Query $q) {
            return $q
                ->where(['Tareas.trabajo_id IS' => null, 'Tareas.estado_id' => 1]);
        });
        
        $this->set(compact('actividades'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * View method
     *
     * @param string|null $id Actividade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $actividad = $this->Actividades->findById($id)
            ->contain(['ActividadesTipos', 'Trabajadores', 'ActividadesInterseccionesDetalles' => ['Intersecciones'], 'Tareas' => function(\Cake\ORM\Query $q) {
                return $q->where(['Tareas.estado_id IN' => [1, 3]])->contain('Intersecciones');
            }])->first();

        $this->set(compact('actividad'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actividade = $this->Actividades->newEmptyEntity();
        if ($this->request->is('post')) {
            $actividade = $this->Actividades->patchEntity($actividade, $this->request->getData());
            if ($this->Actividades->save($actividade)) {
                $this->Flash->success(__('The actividade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividade could not be saved. Please, try again.'));
        }
        $actividadesTipos = $this->Actividades->ActividadesTipos->find('list', ['limit' => 200]);
        $users = $this->Actividades->Users->find('list', ['limit' => 200]);
        $trabajadores = $this->Actividades->Trabajadores->find('list', ['limit' => 200]);
        $estados = $this->Actividades->Estados->find('list', ['limit' => 200]);
        $this->set(compact('actividade', 'actividadesTipos', 'users', 'trabajadores', 'estados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actividade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->request->allowMethod("PUT");
        $actividad = $this->Actividades->newEntity($this->request->getData('actividad'));
        $tareas = $this->Actividades->Tareas->newEntities($this->request->getData('tareas'));
        
        try {
            $this->Actividades->getConnection()->begin();
            
            $this->Actividades->saveOrFail($actividad);
            $this->Actividades->Tareas->saveManyOrFail($tareas);

            $message = 'La actividad fue modificada correctamente';
            
            $this->Actividades->getConnection()->commit();
        } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
            $message = 'La actividad no fue registrada correctamente';
            $errors = $actividad->getErrors();
            $this->Actividades->getConnection()->rollback();
        } finally {
            $this->set(compact('actividad', 'message', 'errors'));
            $this->viewBuilder()->setOption('serialize', true);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Actividade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actividade = $this->Actividades->get($id);
        if ($this->Actividades->delete($actividade)) {
            $this->Flash->success(__('The actividade has been deleted.'));
        } else {
            $this->Flash->error(__('The actividade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function report() {
        $this->request->allowMethod('POST');
        $actividadesTipoIdSelected = $this->request->getData('actividadesTipoIdSelected');
        $interseccionesIdsSelected = $this->request->getData('interseccionesIdsSelected');
        $fechaDesde = $this->request->getData('fechaDesde');
        $fechaHasta = $this->request->getData('fechaHasta');
        
        $actividades = $this->Actividades->find()
            ->contain(['ActividadesInterseccionesDetalles', 'Trabajadores', 'ActividadesTipos'])
            ->where([
                'Actividades.fecha_registro >' => $fechaDesde,
                'Actividades.fecha_registro <=' => $fechaHasta,
                'Actividades.actividades_tipo_id' => $actividadesTipoIdSelected,
                'Actividades.estado_id' => 1
            ]);
        $actividades->matching('ActividadesInterseccionesDetalles', function(\Cake\ORM\Query $q) use ($interseccionesIdsSelected) {
            return $q
                ->where(['ActividadesInterseccionesDetalles.interseccion_id IN' => $interseccionesIdsSelected]);
        });
        
        $this->set(compact('actividades'));
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
        $this->request->allowMethod('POST');
        $id = $this->request->getData('id');
        $actividad = $this->Actividades->get($id);
        $actividad->estado_id = 1;
        
        if ($this->Actividades->save($actividad)) {
            $message = 'La actividad fue habilitada correctamente';
        } else {
            $message = 'La actividad no fue habilitada correctamente';
            $errors = $actividad->getErrors();
        }
        $this->set(compact('actividad', 'message', 'errors'));
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
        $actividad = $this->Actividades->get($id);
        $actividad->estado_id = 2;
        
        if ($this->Actividades->save($actividad)) {
            $message = 'La actividad fue deshabilitada correctamente';
        } else {
            $message = 'La actividad no fue deshabilitada correctamente';
            $errors = $actividad->getErrors();
        }
        $this->set(compact('actividad', 'message', 'errors'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register() {
        $this->request->allowMethod("POST");
        $actividad = $this->Actividades->newEntity($this->request->getData('actividad'));
        $interseccionesIds = $this->request->getData('interseccionesIds');
        $tareas = $this->Actividades->Tareas->newEntities($this->request->getData('tareas'));
        $actividad->tareas = $tareas;
        
        try {
            $this->Actividades->getConnection()->begin();
            
            $this->Actividades->saveOrFail($actividad);
            foreach ($interseccionesIds as $interseccionesId) {
                $actividadesInterseccionesDetalle = $this->Actividades->ActividadesInterseccionesDetalles->newEmptyEntity();
                $actividadesInterseccionesDetalle->fecha_registro = $actividad->fecha_registro;
                $actividadesInterseccionesDetalle->actividad_id = $actividad->id;
                $actividadesInterseccionesDetalle->interseccion_id = $interseccionesId;
                $this->Actividades->ActividadesInterseccionesDetalles->saveOrFail($actividadesInterseccionesDetalle);
            }
            $message = 'La actividad fue registrada correctamente';
            
            $this->Actividades->getConnection()->commit();
        } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
            $message = 'La actividad no fue registrada correctamente';
            $errors = $actividad->getErrors();
            $this->Actividades->getConnection()->rollback();
        } finally {
            $this->set(compact('actividad', 'message', 'errors'));
            $this->viewBuilder()->setOption('serialize', true);
        }
    }
}
