<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $acteur
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Acteur'), ['action' => 'edit', $acteur->id_acteur]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Acteur'), ['action' => 'delete', $acteur->id_acteur], ['confirm' => __('Are you sure you want to delete # {0}?', $acteur->id_acteur)]) ?> </li>
        <li><?= $this->Html->link(__('List Acteurs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acteur'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="acteurs view large-9 medium-8 columns content">
    <h3><?= h($acteur->id_acteur) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($acteur->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($acteur->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Acteur') ?></th>
            <td><?= $this->Number->format($acteur->id_acteur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Naissance') ?></th>
            <td><?= h($acteur->date_naissance) ?></td>
        </tr>
    </table>
</div>
