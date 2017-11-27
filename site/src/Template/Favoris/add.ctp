<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $favori
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Favoris'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="favoris form large-9 medium-8 columns content">
    <?= $this->Form->create($favori) ?>
    <fieldset>
        <legend><?= __('Add Favori') ?></legend>
        <?php
            echo $this->Form->control('id_user');
            echo $this->Form->control('id_film');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
