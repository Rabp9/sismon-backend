<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InterseccionesFixture
 */
class InterseccionesFixture extends TestFixture
{
    public $import = ['table' => 'intersecciones'];
    
    public $records = [
        [
            "descripcion" => "Ducimus doloribus ut libero.",
            "longitud" => "-176",
            "latitud" => "69",
            "codigo" => "9268",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Eveniet cumque quas et.",
            "longitud" => "165",
            "latitud" => "2",
            "codigo" => "1575",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Minima libero adipisci quia.",
            "longitud" => "-54",
            "latitud" => "16",
            "codigo" => "4666",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Atque id aliquam est rerum.",
            "longitud" => "-122",
            "latitud" => "-8",
            "codigo" => "4033",
            "estado_id" => 1
        ],
        [
            "descripcion" => "Sed ut beatae dolorem.",
            "longitud" => "-123",
            "latitud" => "-3",
            "codigo" => "3346",
            "estado_id" => 1
        ]
    ];
}
