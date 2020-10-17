<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actividades Model
 *
 * @property \App\Model\Table\ActividadesTiposTable&\Cake\ORM\Association\BelongsTo $ActividadesTipos
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TrabajadoresTable&\Cake\ORM\Association\BelongsTo $Trabajadores
 * @property \App\Model\Table\EstadosTable&\Cake\ORM\Association\BelongsTo $Estados
 * @property \App\Model\Table\ActividadesInterseccionesDetallesTable&\Cake\ORM\Association\HasMany $ActividadesInterseccionesDetalles
 *
 * @method \App\Model\Entity\Actividad newEmptyEntity()
 * @method \App\Model\Entity\Actividad newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Actividad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actividad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Actividad findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Actividad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Actividad[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actividad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ActividadesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('actividades');
        $this->setDisplayField('descripcion');
        $this->setEntityClass('Actividad');
        $this->setPrimaryKey('id');

        $this->belongsTo('ActividadesTipos', [
            'foreignKey' => 'actividades_tipo_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Trabajadores', [
            'foreignKey' => 'trabajador_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER',
        ]);
        
        $this->hasMany('ActividadesInterseccionesDetalles', [
            'foreignKey' => 'actividad_id'
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
            ->date('fecha_registro')
            ->requirePresence('fecha_registro', 'create')
            ->notEmptyDate('fecha_registro');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker {
        $rules->add($rules->existsIn(['actividades_tipo_id'], 'ActividadesTipos'), ['errorField' => 'actividades_tipo_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['trabajador_id'], 'Trabajadores'), ['errorField' => 'trabajador_id']);
        $rules->add($rules->existsIn(['estado_id'], 'Estados'), ['errorField' => 'estado_id']);

        return $rules;
    }
}
