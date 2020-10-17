<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Actividad Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property \Cake\I18n\FrozenDate $fecha_registro
 * @property int $actividades_tipo_id
 * @property int $user_id
 * @property int $trabajador_id
 * @property int $estado_id
 *
 * @property \App\Model\Entity\ActividadesTipo $actividades_tipo
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Trabajador $trabajador
 * @property \App\Model\Entity\Estado $estado
 */
class Actividad extends Entity
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
        'fecha_registro' => true,
        'actividades_tipo' => true,
        'user' => true,
        'trabajador' => true,
        'estado' => true,
        'estado_id' => true,
    ];
}
