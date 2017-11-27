<?= 
    $this->Flash->render()
?>

    <fieldset>
        <legend><?= __('Ajout d\'un acteur') ?></legend>
        <div class="container">
                <?= $this->Form->create(); ?>
                    <div class="form-group">
                        
                        <?php
                            echo $this->Form->control('nom');
                            echo $this->Form->control('prenom');
                            echo $this->Form->control('date_naissance', ['type'=>'date']);
                            echo $this->Form->button(__('Sauvegarder l\'acteur'));
                            echo $this->Form->end();
                        ?>
                    </div>
                
            </div>
    

        
    </fieldset>
