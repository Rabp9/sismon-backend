<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 4; $i++) {
            $data[] = [
                'username' =>  $faker->userName,
                'password' => $faker->password,
                'trabajador_id' => $faker->numberBetween(1, 10),
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 6; $i++) {
            $data[] = [
                'username' =>  $faker->userName,
                'password' => $faker->password,
                'trabajador_id' => null,
                'estado_id' => 1
            ];
        }
        
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'username' =>  $faker->userName,
                'password' => $faker->password,
                'trabajador_id' => null,
                'estado_id' => 2
            ];
        }
        
        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
