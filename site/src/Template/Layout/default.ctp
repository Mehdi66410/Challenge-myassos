<?php
use App\Controller\AppController;
use App\Auth;

use Cake\ORM\Entity;
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->fetch('css') ?>
    
    <div class="container_header">
    <div class="navbar navbar-inverse navbar-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <?=  $this->Html->link(
    'Old Movies',
    '/films/accueil',
    array('class' => 'brand')
);?>
          <div class="nav-collapse collapse">
            <ul class="nav">
            <li><?=  $this->Html->link('Home', array(
    'controller' => 'Films',
    'action' => 'accueil',
));?><li>
              <li><?=  $this->Html->link('Favoris', array(
    'controller' => 'Favoris',
    'action' => 'index',
));?><li>
              <li><?=  $this->Html->link('Acteurs', array(
    'controller' => 'Acteurs',
    'action' => 'index',
));?><li>
            </ul>
              <?php 
                $loguser = $this->request->session()->read('Auth.User');
                if($loguser){
                  echo "<a class='brand'>
Bonjour ".$loguser['username']."</a>
                <ul class='nav pull-right'>
                  <li>
                     ".$this->Html->link('Logout', array('controller' => 'Users','action' => 'logout')).";
                  <li>
                </ul>";
                  if($loguser['id_user']===1){
                    echo "<ul class='nav pull-right'>
                  <li>
                     ".$this->Html->link('Users', array('controller' => 'Users','action' => 'index')).";
                  <li>
                </ul>"."<ul class='nav pull-right'>
                  <li>
                     ".$this->Html->link('Films', array('controller' => 'Films','action' => 'index')).";
                  <li>
                </ul>";
                  }

                }else echo "<ul class='nav pull-right'>
                        <li> ".$this->Html->link('Login', array('controller' => 'Users','action' => 'login'
    ))."
                        <li>
                        <li> ".$this->Html->link('Register', array('controller' => 'Users','action' => 'add'
    ))."
                        <li>
                      </ul>";
              ?>
              <?php echo $this->Html->css('bootstrap.min');?>
              <?php echo $this->fetch('css');?> 
              <?php echo $this->Html->script('bootstrap.min');?>
              <?php echo $this->fetch('script');?>
              <?php echo $this->Html->script('jquery.min');?>
              <?php echo $this->fetch('script');?>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
</head>
    <footer>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
      <!-- Le styles -->
    
    </footer>

</html>

