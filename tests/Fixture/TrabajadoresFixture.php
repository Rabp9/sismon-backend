<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrabajadoresFixture
 */
class TrabajadoresFixture extends TestFixture
{
    public $import = ['table' => 'trabajadores'];
    
    public $records = [
        [
            "nombres" => "Bruce",
            "apellido_paterno" => "Haag",
            "apellido_materno" => "Legros",
            "dni" => "89600747",
            "estado_id" => 1
        ], [
            "nombres" => "Darron",
            "apellido_paterno" => "Boyle",
            "apellido_materno" => "Heaney",
            "dni" => "38335546",
            "estado_id" => 1
        ], [
            "nombres" => "Austyn",
            "apellido_paterno" => "Bernier",
            "apellido_materno" => "Gibson",
            "dni" => "50147110",
            "estado_id" => 1
        ], [
            "nombres" => "Kristopher",
            "apellido_paterno" => "Boyle",
            "apellido_materno" => "Gulgowski",
            "dni" => "27810475",
            "estado_id" => 1
        ], [
            "nombres" => "Lindsey",
            "apellido_paterno" => "Daugherty",
            "apellido_materno" => "Moore",
            "dni" => "96874467",
            "estado_id" => 1
        ]
    ];
}
