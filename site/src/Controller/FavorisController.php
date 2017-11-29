<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Favoris Controller
 *
 * @property \App\Model\Table\FavorisTable $Favoris
 *
 * @method \App\Model\Entity\Favori[] paginate($object = null, array $settings = [])
 */
class FavorisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $loguser = $this->request->session()->read('Auth.User');
        if($loguser['id_user']==null)
            return $this->redirect(array("controller" => "Films", 
                      "action" => "accueil"));
        $favoris = $this->paginate($this->Favoris);

        $this->set(compact('favoris'));
        $this->set('_serialize', ['favoris']);
    }

    /**
     * View method
     *
     * @param string|null $id Favori id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favori = $this->Favoris->get($id, [
            'contain' => []
        ]);

        $this->set('favori', $favori);
        $this->set('_serialize', ['favori']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loguser = $this->request->session()->read('Auth.User');
        $user=intval($this->request->getQuery('user'));
        $film=intval($this->request->getQuery('film'));
        $favorisTable = TableRegistry::get('Favoris');
        $favoris = $favorisTable->newEntity();

        $favoris->id_user = $user;

        $favoris->id_film = $film;

        if($loguser['id_user']!=null && $user!=null && $film!=null)
            $favorisTable->save($favoris);
        return $this->redirect(array("controller" => "Films", 
                      "action" => "accueil"));
    }

    /**
     * Edit method
     *
     * @param string|null $id Favori id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favori = $this->Favoris->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favori = $this->Favoris->patchEntity($favori, $this->request->getData());
            if ($this->Favoris->save($favori)) {
                $this->Flash->success(__('The favori has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The favori could not be saved. Please, try again.'));
        }
        $this->set(compact('favori'));
        $this->set('_serialize', ['favori']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Favori id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user=intval($this->request->getQuery('user'));
        $film=intval($this->request->getQuery('film'));
        $favorisTable = TableRegistry::get('Favoris');
        $favorisTable->deleteAll(['id_user'=>$user,'id_film'=>$film]);
        return $this->redirect(array("controller" => "Films", "action" => "accueil"));
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
        $this->Auth->deny(['edit','view']);
        $this->Auth->allow(['add','delete']);
    }
}
