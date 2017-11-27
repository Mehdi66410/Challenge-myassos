<?php
// src/Model/Entity/Acteurs.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Acteurs extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        
    ];
}