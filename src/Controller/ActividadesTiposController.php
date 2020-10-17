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
        $actividadesTipos = $this->ActividadesTipos->find();

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
    public function view($id = null)
    {
        $actividadesTipo = $this->ActividadesTipos->get($id, [
            'contain' => ['Estados'],
        ]);

        $this->set(compact('actividadesTipo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $actividadesTipo = $this->ActividadesTipos->newEmptyEntity();
        if ($this->request->is('post')) {
            $actividadesTipo = $this->ActividadesTipos->patchEntity($actividadesTipo, $this->request->getData());
            if ($this->ActividadesTipos->save($actividadesTipo)) {
                $this->Flash->success(__('The actividades tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividades tipo could not be saved. Please, try again.'));
        }
        $estados = $this->ActividadesTipos->Estados->find('list', ['limit' => 200]);
        $this->set(compact('actividadesTipo', 'estados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Actividades Tipo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actividadesTipo = $this->ActividadesTipos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actividadesTipo = $this->ActividadesTipos->patchEntity($actividadesTipo, $this->request->getData());
            if ($this->ActividadesTipos->save($actividadesTipo)) {
                $this->Flash->success(__('The actividades tipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividades tipo could not be saved. Please, try again.'));
        }
        $estados = $this->ActividadesTipos->Estados->find('list', ['limit' => 200]);
        $this->set(compact('actividadesTipo', 'estados'));
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
}
