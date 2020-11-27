<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Interseccion Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property string $longitud
 * @property string $latitud
 * @property string|null $codigo
 * @property int $estado_id
 *
 * @property \App\Model\Entity\Estado $estado
 */
class Interseccion extends Entity
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
        'id' => true,
        'descripcion' => true,
        'longitud' => true,
        'latitud' => true,
        'codigo' => true,
        'estado' => true,
        'estado_id' => true
    ];
}
