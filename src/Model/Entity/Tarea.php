<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tarea Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property string $dificultad
 * @property string $prioridad
 * @property \Cake\I18n\FrozenDate $fecha_registro
 * @property \Cake\I18n\FrozenDate $fecha_programada
 * @property \Cake\I18n\FrozenDate|null $fecha_realizada
 * @property int $actividad_id
 * @property int|null $trabajo_id
 * @property int|null $interseccion_id
 * @property int $estado_id
 *
 * @property \App\Model\Entity\Actividade $actividade
 * @property \App\Model\Entity\Trabajo $trabajo
 * @property \App\Model\Entity\Interseccione $interseccione
 * @property \App\Model\Entity\Estado $estado
 */
class Tarea extends Entity
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
        'dificultad' => true,
        'prioridad' => true,
        'fecha_registro' => true,
        'fecha_programada' => true,
        'fecha_realizada' => true,
        'actividad' => true,
        'trabajo' => true,
        'interseccion' => true,
        'estado' => true,
        'trabajo_id' => true,
        'interseccion_id' => true,
        'actividad_id' => true,
        'estado_id' => true
    ];
}
