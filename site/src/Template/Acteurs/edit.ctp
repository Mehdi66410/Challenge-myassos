<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $acteur
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $acteurs->id_acteur],
                ['confirm' => __('Are you sure you want to delete # {0}?', $acteurs->id_acteur)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Acteurs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="acteurs form large-9 medium-8 columns content">
    <?= $this->Form->create($acteurs) ?>
    <fieldset>
        <legend><?= __('Edit Acteur') ?></legend>
        <?php
            echo $this->Form->control('nom');
            echo $this->Form->control('prenom');
            echo $this->Form->control('date_naissance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
