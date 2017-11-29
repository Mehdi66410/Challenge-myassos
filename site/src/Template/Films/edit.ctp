<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Film $film
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $films->id_film],
                ['confirm' => __('Are you sure you want to delete # {0}?', $films->id_film)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Films'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Acteurs'), ['controller' => 'Acteurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Acteur'), ['controller' => 'Acteurs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="films form large-9 medium-8 columns content">
    <?= $this->Form->create($films) ?>
    <fieldset>
        <legend><?= __('Edit Film') ?></legend>
        <?php
            echo $this->Form->control('titre');
            echo $this->Form->control('id_acteur');
            echo $this->Form->control('genre');
            echo $this->Form->control('date_sortie');
            echo $this->Form->control('duree');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
