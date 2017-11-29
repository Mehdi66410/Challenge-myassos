<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;


class ActeursController extends AppController{
	public $uses=array('Post');

 	public function index(){
		$this->loadComponent('Paginator');
        $acteurs = $this->Paginator->paginate($this->Acteurs->find());
        $this->set(compact('acteurs'));
	}

	public function add(){
        $acteurs = $this->Acteurs->newEntity();
        if ($this->request->is('post')) {
            $acteurs = $this->Acteurs->patchEntity($acteurs, $this->request->getData());
            if ($this->Acteurs->save($acteurs)) {
                $this->Flash->success(__('Votre acteur a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter cet acteur.'));
        }
        $this->set('acteurs', $acteurs);
    }

    public function edit($id){
        $acteurs = $this->Acteurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $acteurs = $this->Acteurs->patchEntity($acteurs, $this->request->getData());
            if ($this->Acteurs->save($acteurs)) {
                $this->Flash->success(__('The actor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actor could not be saved. Please, try again.'));
        }
        $this->set(compact('acteurs'));
        $this->set('_serialize', ['acteurs']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $acteur = $this->Acteurs->get($id);
        if ($this->Acteurs->delete($acteur)) {
            $this->Flash->success(__('The actor has been deleted.'));
        } else {
            $this->Flash->error(__('The actor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function view($id){
        $acteur = $this->Acteurs->get($id, [
            'contain' => []
        ]);

        $this->set('acteur', $acteur);
        $this->set('_serialize', ['acteur']);
    }

    public function isAuthorized($user){
        // Admin peuvent accéder à chaque action
        if (isset($user['id_user']) && $user['id_user'] === 1) {
            return true;
        }

        // Par défaut refuser
        return false;
    }

    public function beforeFilter(Event $event){
        // allow only login, forgotpassword
        $this->Auth->deny(['delete','edit','add','view']);
    }

}
?>

