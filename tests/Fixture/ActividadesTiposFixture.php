<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActividadesTiposFixture
 */
class ActividadesTiposFixture extends TestFixture
{
    public $import = ['table' => 'actividades_tipos'];
    
    public $records = [
        [
            "descripcion" => "Soluta.",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Aut.",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Quia.",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Quia est.",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Assumenda.",
            "estado_id" => 1
        ],
    ];
}
