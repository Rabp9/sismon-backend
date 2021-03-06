<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estado Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property string|null $entidad
 *
 * @property \App\Model\Entity\Actividade[] $actividades
 * @property \App\Model\Entity\ActividadesTipo[] $actividades_tipos
 * @property \App\Model\Entity\Interseccion[] $intersecciones
 * @property \App\Model\Entity\Tarea[] $tareas
 * @property \App\Model\Entity\Trabajador[] $trabajadores
 * @property \App\Model\Entity\Trabajo[] $trabajos
 * @property \App\Model\Entity\User[] $users
 */
class Estado extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'descripcion' => true,
        'entidad' => true
    ];
}
