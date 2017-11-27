<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


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

}
?>

