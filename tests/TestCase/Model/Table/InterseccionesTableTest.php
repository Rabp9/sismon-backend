<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InterseccionesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InterseccionesTable Test Case
 */
class InterseccionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InterseccionesTable
     */
    protected $Intersecciones;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Intersecciones') ? [] : ['className' => InterseccionesTable::class];
        $this->Intersecciones = $this->getTableLocator()->get('Intersecciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Intersecciones);

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
