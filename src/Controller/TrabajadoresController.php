<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Trabajadores Controller
 *
 * @property \App\Model\Table\TrabajadoresTable $Trabajadores
 * @method \App\Model\Entity\Trabajadore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrabajadoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->request->allowMethod(['GET']);
        $trabajadores = $this->Trabajadores->find();

        $this->set(compact('trabajadores'));
        $this->viewBuilder()->setOption('serialize', true);
    }

    /**
     * getEnabled method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getEnabled() {
        $this->request->allowMethod(['GET']);
        $trabajadores = $this->Trabajadores->find()
            ->where(['estado_id' => 1]);

        $this->set(compact('trabajadores'));
        $this->viewBuilder()->setOption('serialize', true);
    }
    
    /**
     * View method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $trabajadore = $this->Trabajadores->get($id, [
            'contain' => ['Estados'],
        ]);

        $this->set(compact('trabajadore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trabajadore = $this->Trabajadores->newEmptyEntity();
        if ($this->request->is('post')) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $this->request->getData());
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('The trabajadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trabajadore could not be saved. Please, try again.'));
        }
        $estados = $this->Trabajadores->Estados->find('list', ['limit' => 200]);
        $this->set(compact('trabajadore', 'estados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trabajadore = $this->Trabajadores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $this->request->getData());
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('The trabajadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trabajadore could not be saved. Please, try again.'));
        }
        $estados = $this->Trabajadores->Estados->find('list', ['limit' => 200]);
        $this->set(compact('trabajadore', 'estados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trabajadore = $this->Trabajadores->get($id);
        if ($this->Trabajadores->delete($trabajadore)) {
            $this->Flash->success(__('The trabajadore has been deleted.'));
        } else {
            $this->Flash->error(__('The trabajadore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
