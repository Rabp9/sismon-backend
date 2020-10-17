<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tareas Controller
 *
 * @property \App\Model\Table\TareasTable $Tareas
 * @method \App\Model\Entity\Tarea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TareasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->request->allowMethod(['GET']);
        $tareas = $this->Tareas->find();

        $this->set(compact('tareas'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * getEnabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getByActividad($actividad_id) {
        $this->request->allowMethod(['GET']);
        $tareas = $this->Tareas->find()
            ->where(['Tareas.actividad_id' => $actividad_id, 'Tareas.estado_id' => 1]);

        $this->set(compact('tareas'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    /**
     * View method
     *
     * @param string|null $id Tarea id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarea = $this->Tareas->get($id, [
            'contain' => ['Actividades', 'Trabajos', 'Intersecciones', 'Estados'],
        ]);

        $this->set(compact('tarea'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tarea = $this->Tareas->newEmptyEntity();
        if ($this->request->is('post')) {
            $tarea = $this->Tareas->patchEntity($tarea, $this->request->getData());
            if ($this->Tareas->save($tarea)) {
                $this->Flash->success(__('The tarea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarea could not be saved. Please, try again.'));
        }
        $actividades = $this->Tareas->Actividades->find('list', ['limit' => 200]);
        $trabajos = $this->Tareas->Trabajos->find('list', ['limit' => 200]);
        $intersecciones = $this->Tareas->Intersecciones->find('list', ['limit' => 200]);
        $estados = $this->Tareas->Estados->find('list', ['limit' => 200]);
        $this->set(compact('tarea', 'actividades', 'trabajos', 'intersecciones', 'estados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarea id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarea = $this->Tareas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarea = $this->Tareas->patchEntity($tarea, $this->request->getData());
            if ($this->Tareas->save($tarea)) {
                $this->Flash->success(__('The tarea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarea could not be saved. Please, try again.'));
        }
        $actividades = $this->Tareas->Actividades->find('list', ['limit' => 200]);
        $trabajos = $this->Tareas->Trabajos->find('list', ['limit' => 200]);
        $intersecciones = $this->Tareas->Intersecciones->find('list', ['limit' => 200]);
        $estados = $this->Tareas->Estados->find('list', ['limit' => 200]);
        $this->set(compact('tarea', 'actividades', 'trabajos', 'intersecciones', 'estados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarea id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarea = $this->Tareas->get($id);
        if ($this->Tareas->delete($tarea)) {
            $this->Flash->success(__('The tarea has been deleted.'));
        } else {
            $this->Flash->error(__('The tarea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
