<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Intersecciones Controller
 *
 * @property \App\Model\Table\InterseccionesTable $Intersecciones
 * @method \App\Model\Entity\Interseccion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InterseccionesController extends AppController
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
        
        $query = $this->Intersecciones->find()->order(['id']);

        if ($search) {
            $query->where(['OR' => [
                'Intersecciones.descripcion LIKE' => '%' . $search . '%',
                'Intersecciones.codigo LIKE' => '%' . $search . '%',
            ]]);
        }
        
        if ($estado_id) {
            $query->where(['Intersecciones.estado_id' => $estado_id]);
        }
        
        $count = $query->count();
        if (!$itemsPerPage) {
            $itemsPerPage = $count;
        }
        $intersecciones = $this->paginate($query, [
            'limit' => $itemsPerPage
        ]);
        $paginate = $this->request->getAttribute('paging')['Intersecciones'];
        $pagination = [
            'totalItems' => $paginate['count'],
            'itemsPerPage' =>  $paginate['perPage']
        ];
        
        $this->set(compact('intersecciones', 'pagination', 'count'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * GetEnabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getEnabled() {
        $intersecciones = $this->Intersecciones->find()
            ->where(['estado_id' => 1]);

        $this->set(compact('intersecciones'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * GetDisabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getDisabled() {
        $intersecciones = $this->Intersecciones->find()
            ->where(['estado_id' => 2]);

        $this->set(compact('intersecciones'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * GetWithActividades method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getWithActividades() {
        $intersecciones = $this->Intersecciones->find()
            ->contain([
                'ActividadesInterseccionesDetalles' => [
                    'Actividades' => function(\Cake\ORM\Query $q) {
                        return $q
                            ->where(['Actividades.estado_id IN' => [1, 3]])
                            ->contain(['Tareas' =>  function (\Cake\ORM\Query $q) {
                                return $q->where(['Tareas.estado_id IN' => [1, 3]]);
                            }]);
                    }
                ]
            ])
            ->where(['Intersecciones.estado_id' => 1]);

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
        $this->request->allowMethod('POST');
        $interseccion = $this->Intersecciones->newEntity($this->request->getData());
        $interseccion->estado_id = 1;

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
        $this->request->allowMethod('POST');
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
        $this->request->allowMethod('POST');
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
