<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $favoris
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Favori'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="favoris index large-9 medium-8 columns content">
    <h3><?= __('Favoris') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_favoris') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_film') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($favoris as $favori): ?>
            <tr>
                <td><?= $this->Number->format($favori->id_favoris) ?></td>
                <td><?= $this->Number->format($favori->id_user) ?></td>
                <td><?= $this->Number->format($favori->id_film) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $favori->id_favoris]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $favori->id_favoris]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $favori->id_favoris], ['confirm' => __('Are you sure you want to delete # {0}?', $favori->id_favoris)]) ?>
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
