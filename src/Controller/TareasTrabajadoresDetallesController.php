<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TareasTrabajadoresDetalles Controller
 *
 * @property \App\Model\Table\TareasTrabajadoresDetallesTable $TareasTrabajadoresDetalles
 * @method \App\Model\Entity\TareasTrabajadoresDetalle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TareasTrabajadoresDetallesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->request->allowMethod(['GET']);
        $tareasTrabajadoresDetalles = $this->TareasTrabajadoresDetalles->find();

        $this->set(compact('tareasTrabajadoresDetalles'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * View method
     *
     * @param string|null $id Tareas Trabajadores Detalle id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tareasTrabajadoresDetalle = $this->TareasTrabajadoresDetalles->get($id, [
            'contain' => ['Tareas', 'Trabajadores'],
        ]);

        $this->set(compact('tareasTrabajadoresDetalle'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tareasTrabajadoresDetalle = $this->TareasTrabajadoresDetalles->newEmptyEntity();
        if ($this->request->is('post')) {
            $tareasTrabajadoresDetalle = $this->TareasTrabajadoresDetalles->patchEntity($tareasTrabajadoresDetalle, $this->request->getData());
            if ($this->TareasTrabajadoresDetalles->save($tareasTrabajadoresDetalle)) {
                $this->Flash->success(__('The tareas trabajadores detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tareas trabajadores detalle could not be saved. Please, try again.'));
        }
        $tareas = $this->TareasTrabajadoresDetalles->Tareas->find('list', ['limit' => 200]);
        $trabajadores = $this->TareasTrabajadoresDetalles->Trabajadores->find('list', ['limit' => 200]);
        $this->set(compact('tareasTrabajadoresDetalle', 'tareas', 'trabajadores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tareas Trabajadores Detalle id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tareasTrabajadoresDetalle = $this->TareasTrabajadoresDetalles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tareasTrabajadoresDetalle = $this->TareasTrabajadoresDetalles->patchEntity($tareasTrabajadoresDetalle, $this->request->getData());
            if ($this->TareasTrabajadoresDetalles->save($tareasTrabajadoresDetalle)) {
                $this->Flash->success(__('The tareas trabajadores detalle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tareas trabajadores detalle could not be saved. Please, try again.'));
        }
        $tareas = $this->TareasTrabajadoresDetalles->Tareas->find('list', ['limit' => 200]);
        $trabajadores = $this->TareasTrabajadoresDetalles->Trabajadores->find('list', ['limit' => 200]);
        $this->set(compact('tareasTrabajadoresDetalle', 'tareas', 'trabajadores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tareas Trabajadores Detalle id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tareasTrabajadoresDetalle = $this->TareasTrabajadoresDetalles->get($id);
        if ($this->TareasTrabajadoresDetalles->delete($tareasTrabajadoresDetalle)) {
            $this->Flash->success(__('The tareas trabajadores detalle has been deleted.'));
        } else {
            $this->Flash->error(__('The tareas trabajadores detalle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
