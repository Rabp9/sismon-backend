<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Trabajos Controller
 *
 * @property \App\Model\Table\TrabajosTable $Trabajos
 * @method \App\Model\Entity\Trabajo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrabajosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->request->allowMethod(['GET']);
        $trabajos = $this->Trabajos->find();

        $this->set(compact('trabajos'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * View method
     *
     * @param string|null $id Trabajo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trabajo = $this->Trabajos->get($id, [
            'contain' => ['Estados'],
        ]);

        $this->set(compact('trabajo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trabajo = $this->Trabajos->newEmptyEntity();
        if ($this->request->is('post')) {
            $trabajo = $this->Trabajos->patchEntity($trabajo, $this->request->getData());
            if ($this->Trabajos->save($trabajo)) {
                $this->Flash->success(__('The trabajo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trabajo could not be saved. Please, try again.'));
        }
        $estados = $this->Trabajos->Estados->find('list', ['limit' => 200]);
        $this->set(compact('trabajo', 'estados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trabajo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trabajo = $this->Trabajos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trabajo = $this->Trabajos->patchEntity($trabajo, $this->request->getData());
            if ($this->Trabajos->save($trabajo)) {
                $this->Flash->success(__('The trabajo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trabajo could not be saved. Please, try again.'));
        }
        $estados = $this->Trabajos->Estados->find('list', ['limit' => 200]);
        $this->set(compact('trabajo', 'estados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trabajo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trabajo = $this->Trabajos->get($id);
        if ($this->Trabajos->delete($trabajo)) {
            $this->Flash->success(__('The trabajo has been deleted.'));
        } else {
            $this->Flash->error(__('The trabajo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register() {
        $this->request->allowMethod("POST");
        $trabajo = $this->Trabajos->newEntity($this->request->getData('trabajo'));
        $tareasIds = $this->request->getData('tareasIds');
        $tareasTrabajadoresDetalles = $this->Trabajos->Tareas->TareasTrabajadoresDetalles->newEntities($this->request->getData('tareasTrabajadoresDetalles'));
        
        try {
            $this->Trabajos->getConnection()->begin();
            
            $this->Trabajos->saveOrFail($trabajo);
            $this->Trabajos->Tareas->updateAll([
                'Tareas.fecha_realizada' => $trabajo->fecha_registro,
                'Tareas.trabajo_id' => $trabajo->id,
                'Tareas.estado_id' => 3
            ], [
                'Tareas.id IN' => $tareasIds
            ]);
            $this->Trabajos->Tareas->TareasTrabajadoresDetalles->saveManyOrFail($tareasTrabajadoresDetalles);
            $actividades = $this->Trabajos->Tareas->Actividades->find()->where(['Actividades.estado_id' => 1]);
            foreach ($actividades as $actividad) {
                $cantidadTareasPendientes = $this->Trabajos->Tareas->find()->where(['Tareas.actividad_id' => $actividad->id, 'Tareas.estado_id' => 1])->count();
                if ($cantidadTareasPendientes == 0) {
                    $actividad->estado_id = 3;
                    $this->Trabajos->Tareas->Actividades->saveOrFail($actividad);
                }
            }
            $message = 'El trabajo fue registrado correctamente';
            
            $this->Trabajos->getConnection()->commit();
        } catch(\Cake\ORM\Exception\PersistenceFailedException $e) {
            $message = 'El trabajo no fue registrado correctamente';
            $errors = $trabajo->getErrors();
            $this->Trabajos->getConnection()->rollback();
        } finally {
            $this->set(compact('trabajo', 'message', 'errors'));
            $this->viewBuilder()->setOption('serialize', true);
        }
    }
}
