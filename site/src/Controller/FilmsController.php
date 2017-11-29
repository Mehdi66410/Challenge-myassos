<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

class FilmsController extends AppController{
	public $uses=array('Post');


    public function accueil(){
        $this->loadComponent('Paginator');
        $films = $this->Paginator->paginate($this->Films->find());
        $this->set(compact('films'));
    }

 	public function index(){
		$this->loadComponent('Paginator');
        $films = $this->Paginator->paginate($this->Films->find());
        $this->set(compact('films'));
	}

	public function view($titre = null){
	    $films = $this->Films->findByTitre($titre)->firstOrFail();
	    $this->set(compact('films'));
	}

    public function add(){
        $film = $this->Films->newEntity();
        if ($this->request->is('post')) {
            $film = $this->Films->patchEntity($film, $this->request->getData());
            if ($this->Films->save($film)) {
                $this->Flash->success(__('Votre film a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre article.'));
        }
        $this->set('films', $film);
    }

	public function edit($titre){
		$films = $this->Films->get($titre, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $films = $this->Films->patchEntity($films, $this->request->getData());
            if ($this->Films->save($films)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $this->set(compact('films'));
        $this->set('_serialize', ['films']);
	}

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $film= $this->Films->get($id);
        if ($this->Films->delete($film)) {
            $this->Flash->success(__('The movie has been deleted.'));
        } else {
            $this->Flash->error(__('The movie could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
         $this->Auth->deny(['edit','index']);
        $this->Auth->allow(['add','delete','accueil']);

    }

}
?>

