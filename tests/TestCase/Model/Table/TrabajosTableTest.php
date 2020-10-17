<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrabajosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrabajosTable Test Case
 */
class TrabajosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TrabajosTable
     */
    protected $Trabajos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Trabajos',
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
        $config = $this->getTableLocator()->exists('Trabajos') ? [] : ['className' => TrabajosTable::class];
        $this->Trabajos = $this->getTableLocator()->get('Trabajos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Trabajos);

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
