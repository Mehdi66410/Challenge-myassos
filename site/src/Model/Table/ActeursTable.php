<?php
// src/Model/Table/ActeursTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class ActeursTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}