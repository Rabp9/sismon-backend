<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TareasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TareasTable Test Case
 */
class TareasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TareasTable
     */
    protected $Tareas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Tareas',
        'app.Actividades',
        'app.Trabajos',
        'app.Intersecciones',
        'app.Estados',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tareas') ? [] : ['className' => TareasTable::class];
        $this->Tareas = $this->getTableLocator()->get('Tareas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Tareas);

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
