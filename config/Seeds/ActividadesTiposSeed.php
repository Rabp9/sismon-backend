<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * ActividadesTipos seed.
 */
class ActividadesTiposSeed extends AbstractSeed
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
                'descripcion' => $faker->text(10),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'descripcion' => $faker->text(10),
                'estado_id' => 2
            ];
        }
        
        $table = $this->table('actividades_tipos');
        $table->insert($data)->save();
    }
}
