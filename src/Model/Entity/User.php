<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int|null $trabajador_id
 * @property int $estado_id
 *
 * @property \App\Model\Entity\Trabajador $trabajador
 * @property \App\Model\Entity\Estado $estado
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'trabajador_id' => true,
        'trabajador' => true,
        'estado' => true,
        'estado_id' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
    
    // Automatically hash passwords when they are changed.
    protected function _setPassword(string $password) {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
