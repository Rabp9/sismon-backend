<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TareasTrabajadoresDetalle Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fecha_realizada
 * @property int $tarea_id
 * @property int $trabajador_id
 *
 * @property \App\Model\Entity\Tarea $tarea
 * @property \App\Model\Entity\Trabajador $trabajador
 */
class TareasTrabajadoresDetalle extends Entity
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
        'fecha_realizada' => true,
        'tarea' => true,
        'trabajador' => true,
        'tarea_id' => true,
        'trabajador_id' => true,
    ];
}
