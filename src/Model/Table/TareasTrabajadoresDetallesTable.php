<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TareasTrabajadoresDetalles Model
 *
 * @property \App\Model\Table\TareasTable&\Cake\ORM\Association\BelongsTo $Tareas
 * @property \App\Model\Table\TrabajadoresTable&\Cake\ORM\Association\BelongsTo $Trabajadores
 *
 * @method \App\Model\Entity\TareasTrabajadoresDetalle newEmptyEntity()
 * @method \App\Model\Entity\TareasTrabajadoresDetalle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle get($primaryKey, $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TareasTrabajadoresDetalle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TareasTrabajadoresDetallesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('tareas_trabajadores_detalles');
        $this->setDisplayField('fecha_realizada');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tareas', [
            'foreignKey' => 'tarea_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Trabajadores', [
            'foreignKey' => 'trabajador_id',
            'joinType' => 'INNER',
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
            ->date('fecha_realizada')
            ->requirePresence('fecha_realizada', 'create')
            ->notEmptyDate('fecha_realizada');

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
        $rules->add($rules->existsIn(['tarea_id'], 'Tareas'), ['errorField' => 'tarea_id']);
        $rules->add($rules->existsIn(['trabajador_id'], 'Trabajadores'), ['errorField' => 'trabajador_id']);

        return $rules;
    }
}
