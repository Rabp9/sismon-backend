<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Trabajadores seed.
 */
class TrabajadoresSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'nombres' => $faker->firstNameMale,
                'apellido_paterno' => $faker->lastName,
                'apellido_materno' => $faker->lastName,
                'dni' => $faker->unique()->randomNumber(8),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 2; $i++) {
            $data[] = [
                'nombres' => $faker->text(30),
                'apellido_paterno' => $faker->text(30),
                'apellido_materno' => $faker->text(30),
                'dni' => $faker->unique()->randomNumber(8),
                'estado_id' => 2
            ];
        }
        
        $table = $this->table('trabajadores');
        $table->insert($data)->save();
    }
}
