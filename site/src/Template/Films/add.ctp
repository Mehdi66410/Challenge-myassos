<?= $this->Flash->render() ?>
<div class="container">
    <div class="row">
        <div class='col-sm-4'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    </div>
</div>

<?php
    echo $this->Form->create();
    echo $this->Form->control('titre');
    echo $this->Form->control('genre');
    echo $this->Form->control('date_sortie');
    echo $this->Form->control('duree');
    echo $this->Form->button(__('Sauvegarder le film'));
    echo $this->Form->end();
?>