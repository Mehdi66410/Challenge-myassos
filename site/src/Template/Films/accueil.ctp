<!-- Fichier : src/Template/Films/index.ctp -->

<?php
use Cake\ORM\TableRegistry;

use Cake\Routing\Route\DashedRoute;
use Cake\Event\Event;
$query = TableRegistry::get('acteurs')->find();
$loguser = $this->request->session()->read('Auth.User');
?>
<div class="page-header">
	<h1>Liste des films</h1>
</div>
<table>
    <tr>
        <th>Titre</th>
        <th>Créé le</th>
        <th>Acteur principal</th>
        <th>Action</th>
    </tr>

    <!-- C'est ici que nous bouclons sur notre objet Query $articles pour afficher les informations de chaque article -->
    <?php foreach ($films as $film): ?>
    <tr>
        <td>
            <?= $this->Html->link($film->titre, ['action' => 'view', $film->titre]) ?>
        </td>
        
       <td>
            <?= $film->date_sortie->format('Y-m-d') ?>
        </td>
        <td>
            <?php foreach ($query as $row) {
                if($film->id_acteur==$row->id_acteur)
                    echo "$row->prenom "."$row->nom";
            }
            ?>
        </td>
        <td>
        <?php
            $user = 'null';
            if($loguser['id_user']){
                $user=$loguser['id_user'];
                $count = TableRegistry::get('favoris')->find();
                $total = $count->where(['id_user' => $user,'id_film'=>$film->id_film])->count();
                if($total==0){
                    echo "<li>".$this->Html->link('Ajouter aux favoris', array(
    'controller' => 'favoris',
    'action' => 'add', 'user' => $user, 'film' => $film->id_film 
))."</li>";
                }else if($total>0){
                    echo "<li>".$this->Html->link('Supprimer des favoris', array(
    'controller' => 'favoris',
    'action' => 'delete', 'user' => $user, 'film' => $film->id_film 
))."</li>";
                }
            }else{
                echo "Veuillez vous connecter";
            }
        ?>
        
        </td>
    </tr>
    <?php endforeach; ?>
</table>