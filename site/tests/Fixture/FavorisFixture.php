<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FavorisFixture
 *
 */
class FavorisFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_favoris' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_user' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_film' => ['type' => 'integer', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_foreign_id_user' => ['type' => 'index', 'columns' => ['id_user'], 'length' => []],
            'fk_foreign_id_film' => ['type' => 'index', 'columns' => ['id_film'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_favoris'], 'length' => []],
            'fk_foreign_id_film' => ['type' => 'foreign', 'columns' => ['id_film'], 'references' => ['films', 'id_film'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_foreign_id_user' => ['type' => 'foreign', 'columns' => ['id_user'], 'references' => ['users', 'id_user'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id_favoris' => 1,
            'id_user' => 1,
            'id_film' => 1
        ],
    ];
}
