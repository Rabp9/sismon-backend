<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Tareas seed.
 */
class TareasSeed extends AbstractSeed
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
                'descripcion' =>  $faker->numberBetween(1, 100),
                'dificultad' => $faker->numberBetween(1, 100),
                'prioridad' => $faker->numberBetween(1, 100),
                'fecha_registro' => $faker->numberBetween(1, 300),
                'fecha_programada' => $faker->numberBetween(1, 300),
                'fecha_realizada' => $faker->numberBetween(1, 300),
                'actividad_id' => $faker->ipv4,
                'trabajo_id' => $faker->ipv4,
                'interseccion_id' => $faker->ipv4,
            ];
        }
        
        $table = $this->table('tareas');
        $table->insert($data)->save();
    }
}
