<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $films
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Film'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Acteurs'), ['controller' => 'Acteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Acteur'), ['controller' => 'Acteurs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="films index large-9 medium-8 columns content">
    <h3><?= __('Films') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_film') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_acteur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_sortie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duree') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
            <tr>
                <td><?= $this->Number->format($film->id_film) ?></td>
                <td><?= h($film->titre) ?></td>
                <td><?= $this->Number->format($film->id_acteur) ?></td>
                <td><?= h($film->genre) ?></td>
                <td><?= h($film->date_sortie) ?></td>
                <td><?= $this->Number->format($film->duree) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $film->id_film]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->id_film]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->id_film], ['confirm' => __('Are you sure you want to delete # {0}?', $film->id_film)]) ?>
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
