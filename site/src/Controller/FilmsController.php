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
		$user = $this->Films->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            if ($this->User->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
	}

    public function beforeFilter(Event $event){
        // allow only login, forgotpassword
         $this->Auth->allow(['Films', 'accueil']);
    }

}
?>

