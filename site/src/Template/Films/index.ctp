<!-- Fichier : src/Template/Films/index.ctp -->

<?php
use Cake\ORM\TableRegistry;
$query = TableRegistry::get('acteurs')->find();
?>

<h1>Films</h1>
<table>
    <tr>
        <th>Titre</th>
        <th>Créé le</th>
        <th>Acteur principal</th>
    </tr>

    <!-- C'est ici que nous bouclons sur notre objet Query $articles pour afficher les informations de chaque article -->

    <?php foreach ($films as $film): ?>
    <tr>
        <td>
            <?= $this->Html->link($film->titre, ['action' => 'view', $film->titre]) ?>
        </td>
        <td>
            <?= $film->date_sortie->format(DATE_RFC850) ?>
        </td>
        <td>
            <?php foreach ($query as $row) {
                if($film->id_acteur==$row->id_acteur)
                    echo "$row->nom "."$row->prenom";
            }
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
        
    
</table>