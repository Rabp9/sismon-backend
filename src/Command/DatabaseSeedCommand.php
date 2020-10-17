<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class DatabaseSeedCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io) {
        exec('bin\cake migrations seed --seed EstadosSeed');
        exec('bin\cake migrations seed --seed ActividadesTiposSeed');
        exec('bin\cake migrations seed --seed InterseccionesSeed');
        exec('bin\cake migrations seed --seed TrabajadoresSeed');
        exec('bin\cake migrations seed --seed TrabajosSeed');
        exec('bin\cake migrations seed --seed UsersSeed');
        exec('bin\cake migrations seed --seed ActividadesSeed');
        exec('bin\cake migrations seed --seed ActividadesInterseccionesDetallesSeed');
        exec('bin\cake migrations seed --seed TareasSeed');
        exec('bin\cake migrations seed --seed TareasTrabajadoresDetallesSeed');
        
        $io->out("¡Seed Completo!");
    }
}