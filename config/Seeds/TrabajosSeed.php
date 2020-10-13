<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Trabajos seed.
 */
class TrabajosSeed extends AbstractSeed
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
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'estado_id' => 2
            ];
        }
        
        $table = $this->table('trabajos');
        $table->insert($data)->save();
    }
}
