<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * TareasTrabajadoresDetalles seed.
 */
class TareasTrabajadoresDetallesSeed extends AbstractSeed
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
        $faker = Faker\Factory::create();
        $data = [];
        
        for ($i = 0; $i < 200; $i++) {
            $data[] = [
                'fecha_realizada' => $faker->numberBetween(1, 300),
                'tarea_id' => $faker->ipv4,
                'trabajador_id' => $faker->ipv4
            ];
        }
        
        $table = $this->table('tareas_trabajadores_detalles');
        $table->insert($data)->save();
    }
}
