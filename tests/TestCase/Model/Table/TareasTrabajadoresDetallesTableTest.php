<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TareasTrabajadoresDetallesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TareasTrabajadoresDetallesTable Test Case
 */
class TareasTrabajadoresDetallesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TareasTrabajadoresDetallesTable
     */
    protected $TareasTrabajadoresDetalles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TareasTrabajadoresDetalles',
        'app.Tareas',
        'app.Trabajadores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TareasTrabajadoresDetalles') ? [] : ['className' => TareasTrabajadoresDetallesTable::class];
        $this->TareasTrabajadoresDetalles = $this->getTableLocator()->get('TareasTrabajadoresDetalles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TareasTrabajadoresDetalles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
