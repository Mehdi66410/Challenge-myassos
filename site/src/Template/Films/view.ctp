<!-- Fichier : src/Template/Films/view.ctp -->
<?php
use Cake\ORM\TableRegistry;

$loguser = $this->request->session()->read('Auth.User');
$acteurTable = TableRegistry::get('Acteurs')->find();
        foreach($acteurTable as $acteur_) {
            if($acteur_['id_acteur']==$films->id_acteur)
                $acteur = $acteur_['nom']." ".$acteur_['prenom'];
        }
?>
<h1>Titre du film : <?= h($films->titre) ?></h1>
<p>Genre : <?= h($films->genre) ?></p>
<p>Sortie le : <?= $films->date_sortie->format('Y-m-d') ?></p>
<p>Acteur principal : <?= $acteur ?>
</p>
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