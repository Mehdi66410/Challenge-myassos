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
        $user=intval($this->request->getQuery('user'));
        $film=intval($this->request->getQuery('film'));
        $favorisTable = TableRegistry::get('Favoris');
        $favoris = $favorisTable->newEntity();

        $favoris->id_user = $user;

        $favoris->id_film = $film;

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
        $this->request->allowMethod(['post', 'delete']);
        $favori = $this->Favoris->get($id);
        if ($this->Favoris->delete($favori)) {
            $this->Flash->success(__('The favori has been deleted.'));
        } else {
            $this->Flash->error(__('The favori could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    

    public function beforeFilter(Event $event){
        // allow only login, forgotpassword
         $this->Auth->allow(['Favoris', 'add']);
    }
}
