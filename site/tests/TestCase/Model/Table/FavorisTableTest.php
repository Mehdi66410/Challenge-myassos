<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavorisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavorisTable Test Case
 */
class FavorisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FavorisTable
     */
    public $Favoris;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.favoris'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Favoris') ? [] : ['className' => FavorisTable::class];
        $this->Favoris = TableRegistry::get('Favoris', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Favoris);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
