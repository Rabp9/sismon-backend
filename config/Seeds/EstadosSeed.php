<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Estados seed.
 */
class EstadosSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run() {
        $data = [
            [
                'descripcion' => 'Habilitado',
                'entidad' => '*'
            ],
            [
                'descripcion' => 'Deshabilitado',
                'entidad' => '*'
            ],
            [
                'descripcion' => 'Realizado',
                'entidad' => 'Tarea,Actividad'
            ]
        ];
        
        $table = $this->table('estados');
        $table->insert($data)->save();
    }
}
