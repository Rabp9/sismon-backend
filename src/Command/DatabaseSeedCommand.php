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
/*      exec('bin\cake migrations seed --seed Database3Seed');
        exec('bin\cake migrations seed --seed Database4Seed');
        exec('bin\cake migrations seed --seed Database5Seed');
        exec('bin\cake migrations seed --seed Database6Seed');
        exec('bin\cake migrations seed --seed Database7Seed');
 */
        
        $io->out("¡Seed Completo!");
    }
}