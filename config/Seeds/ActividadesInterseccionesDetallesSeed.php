<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * ActividadesInterseccionesDetalles seed.
 */
class ActividadesInterseccionesDetallesSeed extends AbstractSeed
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
        
        for ($i = 0; $i < 300; $i++) {
            $data[] = [
                'fecha_registro' => $faker->date('Y-m-d', 'now'),
                'actividad_id' => $faker->numberBetween(1, 50),
                'interseccion_id' => $faker->numberBetween(1, 100)
            ];
        }
        
        $table = $this->table('actividades_intersecciones_detalles');
        $table->insert($data)->save();
    }
}
