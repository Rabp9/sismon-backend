<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\TrabajosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TrabajosController Test Case
 *
 * @uses \App\Controller\TrabajosController
 */
class TrabajosControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Estados',
        'app.Actividades',
        'app.Intersecciones',
        'app.Trabajadores',
        'app.Tareas',
        'app.Trabajos',
        'app.TareasTrabajadoresDetalles'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
    
    /**
     * Test register method
     *
     * @return void
     */
    public function testRegister(): void {
        $dataTest1 = [
            'trabajo' => [
                "fecha_registro" => "2020-04-24",
                "estado_id" => 1
            ],
            'tareasIds' => [4, 5, 6],
            'tareasTrabajadoresDetalles' => [
                [
                    "fecha_realizada" => "2002-07-16",
                    "tarea_id" => 4,
                    "trabajador_id" => 2
                ], [
                    "fecha_realizada" => "1976-09-19",
                    "tarea_id" => 4,
                    "trabajador_id" => 4
                ], [
                    "fecha_realizada" => "2002-07-16",
                    "tarea_id" => 5,
                    "trabajador_id" => 2
                ], [
                    "fecha_realizada" => "1976-09-19",
                    "tarea_id" => 5,
                    "trabajador_id" => 4
                ], [
                    "fecha_realizada" => "2002-07-16",
                    "tarea_id" => 6,
                    "trabajador_id" => 2
                ], [
                    "fecha_realizada" => "1976-09-19",
                    "tarea_id" => 6,
                    "trabajador_id" => 4
                ]
            ]
        ];
        $this->post('/api/trabajos/register.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $trabajos = TableRegistry::getTableLocator()->get('Trabajos');
        $tareas = TableRegistry::getTableLocator()->get('Tareas');
        $tareasTrabajadoresDetalles = TableRegistry::getTableLocator()->get('TareasTrabajadoresDetalles');
        
        $query1 = $trabajos->find();
        $this->assertEquals(6, $query1->count());
        
        $query2 = $trabajos->find()->where(['fecha_registro' => '2020-04-24']);
        $this->assertEquals(1, $query2->count());
        
        $query3 = $tareas->find()->where(['id IN' => [4, 5, 6], 'estado_id' => 3]);
        $this->assertEquals(3, $query3->count());
        
        $query4 = $tareasTrabajadoresDetalles->find()->where(['tarea_id IN' => [4, 5, 6]]);
        $this->assertEquals(6, $query4->count());
        
        $this->assertResponseContains('"message": "El trabajo fue registrado correctamente"');
    }
}
