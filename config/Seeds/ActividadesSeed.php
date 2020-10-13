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
        
        for ($i = 0; $i < 200; $i++) {
            $data[] = [
                'descripcion' =>  $faker->numberBetween(1, 100),
                'fecha_registro' => $faker->numberBetween(1, 100),
                'actividades_tipo_id' => $faker->numberBetween(1, 100),
                'user_id' => $faker->numberBetween(1, 300),
                'trabajador_id' => $faker->ipv4
            ];
        }
        
        $table = $this->table('actividades');
        $table->insert($data)->save();
    }
}
