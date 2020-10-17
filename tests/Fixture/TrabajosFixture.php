<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrabajosFixture
 */
class TrabajosFixture extends TestFixture
{
    public $import = ['table' => 'trabajos'];
    
    public $records = [
        [
            "fecha_registro" => "2019-04-24",
            "estado_id" => 1
        ], [
            "fecha_registro" => "2018-06-28",
            "estado_id" => 1
        ], [
            "fecha_registro" => "2017-02-14",
            "estado_id" => 1
        ], [
            "fecha_registro" => "2020-04-16",
            "estado_id" => 1
        ], [
            "fecha_registro" => "2019-09-09",
            "estado_id" => 1
        ]
    ];
}
