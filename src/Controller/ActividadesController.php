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
        $this->request->allowMethod(['GET']);
        $actividades = $this->Actividades->find();

        $this->set(compact('actividades'));
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
     * View method
     *
     * @param string|null $id Actividade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actividade = $this->Actividades->get($id, [
            'contain' => ['ActividadesTipos', 'Users', 'Trabajadores', 'Estados'],
        ]);

        $this->set(compact('actividade'));
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
    public function edit($id = null)
    {
        $actividade = $this->Actividades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
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
            ->contain('ActividadesInterseccionesDetalles')
            ->where([
                'Actividades.fecha_registro >' => $fechaDesde,
                'Actividades.fecha_registro <' => $fechaHasta,
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
}
