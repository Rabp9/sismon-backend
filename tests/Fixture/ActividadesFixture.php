<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActividadesFixture
 */
class ActividadesFixture extends TestFixture
{
    public $import = ['table' => 'actividades'];
    
    public $records = [
        [
            "descripcion" => "Maiores eum veritatis quas.",
            "fecha_registro" => "1975-06-28",
            "actividades_tipo_id" => 2,
            "user_id" => 1,
            "trabajador_id" => 1,
            "estado_id" => 1
        ], [
            "descripcion" => "Porro doloribus alias ut.",
            "fecha_registro" => "1975-12-26",
            "actividades_tipo_id" => 2,
            "user_id" => 1,
            "trabajador_id" => 1,
            "estado_id" => 1
        ], [
            "descripcion" => "Quo atque quae est.",
            "fecha_registro" => "1975-04-27",
            "actividades_tipo_id" => 3,
            "user_id" => 1,
            "trabajador_id" => 2,
            "estado_id" => 1
        ], [
            "descripcion" => "Voluptas aut possimus earum.",
            "fecha_registro" => "1996-08-20",
            "actividades_tipo_id" => 1,
            "user_id" => 1,
            "trabajador_id" => 2,
            "estado_id" => 1
        ], [
            "descripcion" => "Ex et ab minima aut hic sed.",
            "fecha_registro" => "1992-03-05",
            "actividades_tipo_id" => 4,
            "user_id" => 2,
            "trabajador_id" => 3,
            "estado_id" => 1
        ]
    ];
}
