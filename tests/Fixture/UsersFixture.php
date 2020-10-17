<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    public $import = ['table' => 'users'];
    
    public $records = [
        [
            "username" => "xbalistreri",
            "password" => ":]Be}ZtM<,Ty,UGy=(r=",
            "trabajador_id" => 1,
            "estado_id" => 1
        ],
        [
            "username" => "dbartell",
            "password" => "(]%V#+LH",
            "trabajador_id" => 2,
            "estado_id" => 1
        ]
    ];
}
