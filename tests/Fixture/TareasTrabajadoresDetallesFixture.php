<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TareasTrabajadoresDetallesFixture
 */
class TareasTrabajadoresDetallesFixture extends TestFixture
{
    public $import = ['table' => 'tareas_trabajadores_detalles'];
    
    public $records = [
        [
            "fecha_realizada" => "2002-07-16",
            "tarea_id" => 7,
            "trabajador_id" => 10
        ],
        [
            "fecha_realizada" => "1976-09-19",
            "tarea_id" => 7,
            "trabajador_id" => 7
        ],
        [
            "fecha_realizada" => "2019-01-17",
            "tarea_id" => 7,
            "trabajador_id" => 8
        ],
        [
            "fecha_realizada" => "1989-09-22",
            "tarea_id" => 8,
            "trabajador_id" => 3
        ],
        [
            "fecha_realizada" => "1995-01-25",
            "tarea_id" => 8,
            "trabajador_id" => 9
        ],
        [
            "fecha_realizada" => "1984-03-30",
            "tarea_id" => 8,
            "trabajador_id" => 7
        ],
        [
            "fecha_realizada" => "2017-06-24",
            "tarea_id" => 8,
            "trabajador_id" => 10
        ],
        [
            "fecha_realizada" => "1987-12-28",
            "tarea_id" => 8,
            "trabajador_id" => 6
        ],
        [
            "fecha_realizada" => "1985-08-07",
            "tarea_id" => 9,
            "trabajador_id" => 2
        ],
        [
            "fecha_realizada" => "2008-12-16",
            "tarea_id" => 9,
            "trabajador_id" => 9
        ],
        [
            "fecha_realizada" => "2013-03-11",
            "tarea_id" => 10,
            "trabajador_id" => 9
        ],
        [
            "fecha_realizada" => "2008-04-08",
            "tarea_id" => 10,
            "trabajador_id" => 2
        ]
    ];
}
