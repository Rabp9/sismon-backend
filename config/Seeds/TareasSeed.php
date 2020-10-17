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
                'descripcion' => $faker->text(30),
                'dificultad' => $faker->randomElement($array = ['ALTA', 'MEDIA', 'BAJA']),
                'prioridad' => $faker->randomElement($array = ['ALTA', 'MEDIA', 'BAJA']),
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'fecha_programada' => $faker->date('Y-m-d', 'now'),
                'fecha_realizada' => $faker->date('Y-m-d', 'now'),
                'actividad_id' => $faker->numberBetween(1, 50),
                'trabajo_id' => $faker->numberBetween(1, 100),
                'interseccion_id' => $faker->numberBetween(1, 100),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'descripcion' => $faker->text(30),
                'dificultad' => $faker->randomElement($array = ['ALTA', 'MEDIA', 'BAJA']),
                'prioridad' => $faker->randomElement($array = ['ALTA', 'MEDIA', 'BAJA']),
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'fecha_programada' => $faker->date('Y-m-d', 'now'),
                'fecha_realizada' => $faker->date('Y-m-d', 'now'),
                'actividad_id' => $faker->numberBetween(1, 50),
                'trabajo_id' => null,
                'interseccion_id' => $faker->numberBetween(1, 100),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'descripcion' => $faker->text(30),
                'dificultad' => $faker->randomElement($array = ['ALTA', 'MEDIA', 'BAJA']),
                'prioridad' => $faker->randomElement($array = ['ALTA', 'MEDIA', 'BAJA']),
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'fecha_programada' => $faker->date('Y-m-d', 'now'),
                'fecha_realizada' => $faker->date('Y-m-d', 'now'),
                'actividad_id' => $faker->numberBetween(1, 50),
                'trabajo_id' => $faker->numberBetween(1, 100),
                'interseccion_id' => $faker->numberBetween(1, 100),
                'estado_id' => 2
            ];
        }
        
        $table = $this->table('tareas');
        $table->insert($data)->save();
    }
}
