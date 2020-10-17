<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tareas Model
 *
 * @property \App\Model\Table\ActividadesTable&\Cake\ORM\Association\BelongsTo $Actividades
 * @property \App\Model\Table\TrabajosTable&\Cake\ORM\Association\BelongsTo $Trabajos
 * @property \App\Model\Table\InterseccionesTable&\Cake\ORM\Association\BelongsTo $Intersecciones
 * @property \App\Model\Table\EstadosTable&\Cake\ORM\Association\BelongsTo $Estados
 *
 * @method \App\Model\Entity\Tarea newEmptyEntity()
 * @method \App\Model\Entity\Tarea newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tarea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tarea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tarea findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tarea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tarea[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tarea|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarea saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarea[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tarea[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tarea[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tarea[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TareasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('tareas');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->belongsTo('Actividades', [
            'foreignKey' => 'actividad_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Trabajos', [
            'foreignKey' => 'trabajo_id',
        ]);
        $this->belongsTo('Intersecciones', [
            'foreignKey' => 'interseccion_id',
        ]);
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TareasTrabajadoresDetalles')
            ->setForeignKey('tarea_id');
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
            ->scalar('dificultad')
            ->maxLength('dificultad', 45)
            ->requirePresence('dificultad', 'create')
            ->notEmptyString('dificultad');

        $validator
            ->scalar('prioridad')
            ->maxLength('prioridad', 45)
            ->requirePresence('prioridad', 'create')
            ->notEmptyString('prioridad');

        $validator
            ->date('fecha_registro')
            ->requirePresence('fecha_registro', 'create')
            ->notEmptyDate('fecha_registro');

        $validator
            ->date('fecha_programada')
            ->requirePresence('fecha_programada', 'create')
            ->notEmptyDate('fecha_programada');

        $validator
            ->date('fecha_realizada')
            ->allowEmptyDate('fecha_realizada');

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
        $rules->add($rules->existsIn(['trabajo_id'], 'Trabajos'), ['errorField' => 'trabajo_id']);
        $rules->add($rules->existsIn(['interseccion_id'], 'Intersecciones'), ['errorField' => 'interseccion_id']);
        $rules->add($rules->existsIn(['estado_id'], 'Estados'), ['errorField' => 'estado_id']);

        return $rules;
    }
}
