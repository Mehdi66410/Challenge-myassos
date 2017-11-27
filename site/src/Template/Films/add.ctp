<?= 
    $this->Flash->render()
?>

    <fieldset>
        <legend><?= __('Ajout de film') ?></legend>
        <div class="container">
                <?= $this->Form->create(); ?>
                    <div class="form-group">
                        
                        <?php
                            echo $this->Form->control('titre');
                            echo $this->Form->control('genre');
                            echo $this->Form->control('id_acteur');
                            echo $this->Form->control('date_sortie', ['type'=>'date']);
                            echo $this->Form->control('duree');
                            echo $this->Form->button(__('Sauvegarder le film'));
                            echo $this->Form->end();
                        ?>
                    </div>
                
            </div>
    

        
    </fieldset>
