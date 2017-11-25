<?php

namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


class FilmsController extends AppController{
	public $uses=array('Post');

 	public function index(){
		$this->loadComponent('Paginator');
        $films = $this->Paginator->paginate($this->Films->find());
        $this->set(compact('films'));
	}

	public function view($titre = null){
	    $films = $this->Films->findByTitre($titre)->firstOrFail();
	    $this->set(compact('films'));
	}

	public function edit($titre){
		
	}

}
?>

