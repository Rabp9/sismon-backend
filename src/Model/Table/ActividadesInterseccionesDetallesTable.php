<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActividadesInterseccionesDetalles Model
 *
 * @property \App\Model\Table\ActividadesTable&\Cake\ORM\Association\BelongsTo $Actividades
 * @property \App\Model\Table\InterseccionesTable&\Cake\ORM\Association\BelongsTo $Intersecciones
 *
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle newEmptyEntity()
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ActividadesInterseccionesDetalle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ActividadesInterseccionesDetallesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('actividades_intersecciones_detalles');
        $this->setDisplayField('fecha_registro');
        $this->setPrimaryKey('id');

        $this->belongsTo('Actividades')
            ->setForeignKey('actividad_id')->setJoinType('INNER')
            ->setProperty('actividad');
        
        $this->belongsTo('Intersecciones')
            ->setForeignKey('interseccion_id')->setJoinType('INNER')
            ->setProperty('interseccion');
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
        $rules->add($rules->existsIn(['actividad_id'], 'Actividades'), ['errorField' => 'actividad_id']);
        $rules->add($rules->existsIn(['interseccion_id'], 'Intersecciones'), ['errorField' => 'interseccion_id']);

        return $rules;
    }
}
