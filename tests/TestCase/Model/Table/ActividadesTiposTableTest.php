<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActividadesTiposTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActividadesTiposTable Test Case
 */
class ActividadesTiposTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ActividadesTiposTable
     */
    protected $ActividadesTipos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ActividadesTipos',
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
        $config = $this->getTableLocator()->exists('ActividadesTipos') ? [] : ['className' => ActividadesTiposTable::class];
        $this->ActividadesTipos = $this->getTableLocator()->get('ActividadesTipos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ActividadesTipos);

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
