<!-- Fichier : src/Template/Films/view.ctp -->
<?php
use Cake\ORM\TableRegistry;

$loguser = $this->request->session()->read('Auth.User');

?>
<h1><?= h($films->titre) ?></h1>
<p><?= h($films->genre) ?></p>
<p><small>Créé le : <?= $films->date_sortie->format(DATE_RFC850) ?></small></p>
<p><?php 
	$user = 'null';
            if($loguser['id_user']){
                $user=$loguser['id_user'];
                $count = TableRegistry::get('favoris')->find();
                $total = $count->where(['id_user' => $user,'id_film'=>$films->id_film])->count();
                if($total==0){
                    echo "<li>".$this->Html->link('Ajouter aux favoris', array(
    'controller' => 'favoris',
    'action' => 'add', 'user' => $user, 'film' => $films->id_film 
))."</li>";
                }else if($total>0){
                    echo "<li>".$this->Html->link('Supprimer des favoris', array(
    'controller' => 'favoris',
    'action' => 'delete', 'user' => $user, 'film' => $films->id_film 
))."</li>";
                }
            }else{
                echo "Veuillez vous connecter";
     }?></p>