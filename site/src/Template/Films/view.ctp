<!-- Fichier : src/Template/Films/view.ctp -->

<h1><?= h($films->titre) ?></h1>
<p><?= h($films->genre) ?></p>
<p><small>Créé le : <?= $films->date_sortie->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Ajouter aux favoris', ['action' => 'edit', $films->titre]) ?></p>