<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActividadesInterseccionesDetallesFixture
 */
class ActividadesInterseccionesDetallesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha_registro' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'actividad_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'interseccion_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_actividades_intersecciones_detalles_actividades1_idx' => ['type' => 'index', 'columns' => ['actividad_id'], 'length' => []],
            'fk_actividades_intersecciones_detalles_intersecciones1_idx' => ['type' => 'index', 'columns' => ['interseccion_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'actividad_id', 'interseccion_id'], 'length' => []],
            'fk_actividades_intersecciones_detalles_intersecciones1' => ['type' => 'foreign', 'columns' => ['interseccion_id'], 'references' => ['intersecciones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_actividades_intersecciones_detalles_actividades1' => ['type' => 'foreign', 'columns' => ['actividad_id'], 'references' => ['actividades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'fecha_registro' => '2020-10-14',
                'actividad_id' => 1,
                'interseccion_id' => 1,
            ],
        ];
        parent::init();
    }
}
