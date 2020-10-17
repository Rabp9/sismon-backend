<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Actividades seed.
 */
class ActividadesSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'descripcion' => $faker->text(30),
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'actividades_tipo_id' => $faker->numberBetween(1, 15),
                'user_id' => $faker->numberBetween(1, 10),
                'trabajador_id' => $faker->numberBetween(1, 10),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'descripcion' => $faker->text(30),
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'actividades_tipo_id' => $faker->numberBetween(1, 15),
                'user_id' => $faker->numberBetween(1, 10),
                'trabajador_id' => $faker->numberBetween(1, 10),
                'estado_id' => 2
            ];
        }
        
        $table = $this->table('actividades');
        $table->insert($data)->save();
    }
}
