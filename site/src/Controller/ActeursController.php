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

	public function action(){
		
	}

}
?>

