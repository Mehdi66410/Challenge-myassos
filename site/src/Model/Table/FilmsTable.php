<?php
// src/Model/Table/FilmsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class FilmsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}