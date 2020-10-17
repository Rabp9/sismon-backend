<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estados Model
 *
 * @property \App\Model\Table\ActividadesTable&\Cake\ORM\Association\HasMany $Actividades
 * @property \App\Model\Table\ActividadesTiposTable&\Cake\ORM\Association\HasMany $ActividadesTipos
 * @property \App\Model\Table\InterseccionesTable&\Cake\ORM\Association\HasMany $Intersecciones
 * @property \App\Model\Table\TareasTable&\Cake\ORM\Association\HasMany $Tareas
 * @property \App\Model\Table\TrabajadoresTable&\Cake\ORM\Association\HasMany $Trabajadores
 * @property \App\Model\Table\TrabajosTable&\Cake\ORM\Association\HasMany $Trabajos
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Estado newEmptyEntity()
 * @method \App\Model\Entity\Estado newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Estado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estado findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Estado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estado[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estado|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estado saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estado[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estado[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estado[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Estado[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EstadosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('estados');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->hasMany('Actividades', [
            'foreignKey' => 'estado_id',
        ]);
        $this->hasMany('ActividadesTipos', [
            'foreignKey' => 'estado_id',
        ]);
        $this->hasMany('Intersecciones', [
            'foreignKey' => 'estado_id',
        ]);
        $this->hasMany('Tareas', [
            'foreignKey' => 'estado_id',
        ]);
        $this->hasMany('Trabajadores', [
            'foreignKey' => 'estado_id',
        ]);
        $this->hasMany('Trabajos', [
            'foreignKey' => 'estado_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'estado_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 45)
            ->requirePresence('descripcion', 'create')
            ->notEmptyString('descripcion');

        $validator
            ->scalar('entidad')
            ->maxLength('entidad', 45)
            ->allowEmptyString('entidad');

        return $validator;
    }
}
