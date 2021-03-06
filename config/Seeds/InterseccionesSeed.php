<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Intersecciones seed.
 */
class InterseccionesSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'descripcion' =>  $faker->text(30),
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'codigo' => $faker->unique()->randomNumber(4),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'descripcion' =>  $faker->text(30),
                'latitud' => $faker->latitude,
                'longitud' => $faker->longitude,
                'codigo' => $faker->unique()->randomNumber(4),
                'estado_id' => 2
            ];
        }
        
        $table = $this->table('intersecciones');
        $table->insert($data)->save();
    }
}
