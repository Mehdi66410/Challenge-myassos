<?php
// src/Model/Entity/Film.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Film extends Entity
{
    protected $_accessible = [
        'id_film' => true,
        'titre' =>true,
        'id_acteur' => true,
        'genre' => true,
        'date_sortie' => true,
        'duree' =>true
    ];
}