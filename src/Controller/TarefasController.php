<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tarefas Controller
 *
 * @property \App\Model\Table\TarefasTable $Tarefas
 */
class TarefasController extends AppController
{

    public function initialize()
    {
      parent::initialize();
      $this->loadComponent('RequestHandler');

      $this->response->header('Access-Control-Allow-Origin','*');
      $this->response->header('Access-Control-Allow-Methods','*');
      $this->response->header('Access-Control-Allow-Headers','X-Requested-With');
      $this->response->header('Access-Control-Allow-Headers','Content-Type, x-xsrf-token');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tarefas = $this->paginate($this->Tarefas);

        $this->set(compact('tarefas'));
        $this->set('_serialize', ['tarefas']);
    }

    /**
     * View method
     *
     * @param string|null $id Tarefa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarefa = $this->Tarefas->get($id, [
            'contain' => []
        ]);

        $this->set('tarefa', $tarefa);
        $this->set('_serialize', ['tarefa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tarefa = $this->Tarefas->newEntity();
        if ($this->request->is('post')) {
            $tarefa = $this->Tarefas->patchEntity($tarefa, $this->request->data);
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success(__('The tarefa has been saved.'));
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tarefa'));
        $this->set('_serialize', ['tarefa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarefa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarefa = $this->Tarefas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarefa = $this->Tarefas->patchEntity($tarefa, $this->request->data);
            if ($this->Tarefas->save($tarefa)) {
                $this->Flash->success(__('The tarefa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tarefa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tarefa'));
        $this->set('_serialize', ['tarefa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarefa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->response->header('Access-Control-Allow-Methods','*');
        $this->request->allowMethod(['post', 'delete']);
        $tarefa = $this->Tarefas->get($id);
        if ($this->Tarefas->delete($tarefa)) {
            $this->Flash->success(__('The tarefa has been deleted.'));
        } else {
            $this->Flash->error(__('The tarefa could not be deleted. Please, try again.'));
        }
        //return $this->redirect(['action' => 'index']);
    }
}
