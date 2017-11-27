<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $favori
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Favori'), ['action' => 'edit', $favori->id_favoris]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Favori'), ['action' => 'delete', $favori->id_favoris], ['confirm' => __('Are you sure you want to delete # {0}?', $favori->id_favoris)]) ?> </li>
        <li><?= $this->Html->link(__('List Favoris'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favori'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="favoris view large-9 medium-8 columns content">
    <h3><?= h($favori->id_favoris) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Favoris') ?></th>
            <td><?= $this->Number->format($favori->id_favoris) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($favori->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Film') ?></th>
            <td><?= $this->Number->format($favori->id_film) ?></td>
        </tr>
    </table>
</div>
