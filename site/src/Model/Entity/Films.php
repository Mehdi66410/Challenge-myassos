<?php
// src/Model/Entity/Film.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Films extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        
    ];
}