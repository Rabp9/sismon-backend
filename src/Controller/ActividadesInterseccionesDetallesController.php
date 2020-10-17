<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ActividadesInterseccionesDetalles Controller
 *
 * @property \App\Model\Table\ActividadesInterseccionesDetallesTable $ActividadesInterseccionesDetalles
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActividadesInterseccionesDetallesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Actividades', 'Intersecciones'],
        ];
        $actividadesInterseccionesDetalles = $this->paginate($this->ActividadesInterseccionesDetalles);

        $this->set(compact('actividadesInterseccionesDetalles'));
    }

    /**
     * View method
     *
     * @param string|null $id Actividades Intersecciones Detalle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $actividadesInterseccionesDetalle = $this->ActividadesInterseccionesDetalles->get($id, [
            'contain' => ['Actividades', 'Intersecciones'],
        ]);

        $this->set(compact('actividadesInterseccionesDetalle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actividadesInterseccionesDetalle = $this->ActividadesInterseccionesDetalles->newEmptyEntity();
        if ($this->request->is('post')) {
            $actividadesInterseccionesDetalle = $this->ActividadesInterseccionesDetalles->patchEntity($actividadesInterseccionesDetalle, $this->request->getData());
            if ($this->ActividadesInterseccionesDetalles->save($actividadesInterseccionesDetalle)) {
                $this->Flash->success(__('The actividades intersecciones detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividades intersecciones detalle could not be saved. Please, try again.'));
        }
        $actividades = $this->ActividadesInterseccionesDetalles->Actividades->find('list', ['limit' => 200]);
        $intersecciones = $this->ActividadesInterseccionesDetalles->Intersecciones->find('list', ['limit' => 200]);
        $this->set(compact('actividadesInterseccionesDetalle', 'actividades', 'intersecciones'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actividades Intersecciones Detalle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actividadesInterseccionesDetalle = $this->ActividadesInterseccionesDetalles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actividadesInterseccionesDetalle = $this->ActividadesInterseccionesDetalles->patchEntity($actividadesInterseccionesDetalle, $this->request->getData());
            if ($this->ActividadesInterseccionesDetalles->save($actividadesInterseccionesDetalle)) {
                $this->Flash->success(__('The actividades intersecciones detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividades intersecciones detalle could not be saved. Please, try again.'));
        }
        $actividades = $this->ActividadesInterseccionesDetalles->Actividades->find('list', ['limit' => 200]);
        $intersecciones = $this->ActividadesInterseccionesDetalles->Intersecciones->find('list', ['limit' => 200]);
        $this->set(compact('actividadesInterseccionesDetalle', 'actividades', 'intersecciones'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actividades Intersecciones Detalle id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actividadesInterseccionesDetalle = $this->ActividadesInterseccionesDetalles->get($id);
        if ($this->ActividadesInterseccionesDetalles->delete($actividadesInterseccionesDetalle)) {
            $this->Flash->success(__('The actividades intersecciones detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The actividades intersecciones detalle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
