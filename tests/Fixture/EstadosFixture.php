<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EstadosFixture
 */
class EstadosFixture extends TestFixture
{
    public $import = ['table' => 'estados'];
    
    public $records = [
        [
            "descripcion" => "Habilitado",
            "entidad" => "*"
        ],
        [
            "descripcion" => "Deshabilitado",
            "entidad" => "*"
        ],
        [
            "descripcion" => "Realizado",
            "entidad" => "Tarea,Actividad"
        ]
    ];
}
