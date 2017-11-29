<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $favoris
 */
use Cake\ORM\TableRegistry;

$acteurTable = TableRegistry::get('acteurs')->find();
$query_ = TableRegistry::get('Favoris')->find();
$loguser = $this->request->session()->read('Auth.User');
if($loguser['id_user']!=1){
    $favoris=array();
    foreach ($query_ as $favori){
        if($favori['id_user']==$loguser['id_user']){
            array_push($favoris,$favori);
        }
    }
}
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($loguser['id_user']==1){
                echo "<li>";
                echo $this->Html->link(__('New Favori'), ['action' => 'add']);
                echo "</li>";
            }else echo "<li>Session admin nécessaire</li>";
        ?>
    </ul>
</nav>
<div class="favoris index large-9 medium-8 columns content">
    <h3><?= __('Favoris') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_favoris') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Titre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favoris as $favori): ?>
            <tr>
                <?php
                    $filmTable = TableRegistry::get('films')->find();
                    $userTable = TableRegistry::get('users')->find();
                    foreach($userTable as $user_) {
                        if($user_['id_user']==$favori->id_user)
                            $username=$user_['username'];
                    }
                    foreach($filmTable as $film_) {
                        if($film_['id_film']==$favori->id_film)
                            $film=$film_['titre'];
                    }                 
                echo "<td>"; echo $this->Number->format($favori->id_favoris); echo "</td>";
                echo "<td>";echo $username;echo "</td>";
                echo "<td>";echo $film;echo "</td>";
                ?>
                <td class="actions">
                    <?php 
                        if($loguser['id_user']==1){
                         echo $this->Html->link(__('View '), ['action' => 'view', $favori->id_favoris]);
                         echo $this->Html->link(__('Edit '), ['action' => 'edit', $favori->id_favoris]); 
                         echo $this->Form->postLink(__('Delete '), ['action' => 'delete', $favori->id_favoris], ['confirm' => __('Are you sure you want to delete # {0}?', $favori->id_favoris)]);
                        }else echo "Admin requis";
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
