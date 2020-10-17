<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\InterseccionesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\InterseccionesController Test Case
 *
 * @uses \App\Controller\InterseccionesController
 */
class InterseccionesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Estados',
        'app.Intersecciones'
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
    public function testAdd(): void {
        $dataTest1 = [
            "descripcion" => "dsadasdas",
            "longitud" => -150,
            "latitud" => -57,
            "codigo" => "4185",
            "estado_id" => 1
        ];
        $this->post('/api/intersecciones.json', $dataTest1);
        $this->assertResponseCode(200);
        
        $intersecciones = TableRegistry::getTableLocator()->get('Intersecciones');
        $query = $intersecciones->find()->where(['descripcion' => $dataTest1['descripcion']]);
        $this->assertEquals(1, $query->count());
        $this->assertResponseContains('n fue registrada correctamente');
        /*
        // En caso se duplique el código
        $dataTest2 = [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '78',
            'descripcion' => 'Av. Algo',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest2);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
        
        // En caso se duplique la descripcion
        $dataTest3 = [
            'punto_id' => 1,
            'regulador_id' => 4,
            'codigo' => '421',
            'descripcion' => 'Ca. San Martín',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest3);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
        
        // En caso se desee agregar un cruce con codigo desactivado
        $dataTest4 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '69',
            'descripcion' => 'Ca.',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest4);
        $this->assertResponseCode(200);
        
        $queryTest4 = $cruces->find()->where(['codigo' => $dataTest4['codigo'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest4->count());
        $this->assertResponseContains('"message": "El cruce fue registrado correctamente"');
                
        // En caso se desee agregar un punto con descripcion desactivada
        $dataTest5 = [
            'punto_id' => 2,
            'regulador_id' => 4,
            'codigo' => '100',
            'descripcion' => 'Ca. Orbegoso',
            'estado_id' => 1
        ];
        $this->post('/api/cruces.json', $dataTest5);
        $this->assertResponseCode(200);
        
        $queryTest5 = $cruces->find()->where(['descripcion' => $dataTest5['descripcion'], 'estado_id' => 1]);
        $this->assertEquals(1, $queryTest5->count());
        $this->assertResponseContains('"message": "El cruce fue registrado correctamente"');
        
        // En caso se desee agregar un cruce con codigo activo y desactivado
        $this->post('/api/cruces.json', $dataTest4);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
        
        // En caso se desee agregar un cruce con descripcion activo y desactivado
        $this->post('/api/cruces.json', $dataTest5);
        $this->assertResponseCode(200);
        $this->assertResponseContains('"message": "El cruce no fue registrado correctamente"');
         * 
         */
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
}
