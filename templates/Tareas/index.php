<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarea[]|\Cake\Collection\CollectionInterface $tareas
 */
?>
<div class="tareas index content">
    <?= $this->Html->link(__('New Tarea'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tareas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('dificultad') ?></th>
                    <th><?= $this->Paginator->sort('prioridad') ?></th>
                    <th><?= $this->Paginator->sort('fecha_registro') ?></th>
                    <th><?= $this->Paginator->sort('fecha_programada') ?></th>
                    <th><?= $this->Paginator->sort('fecha_realizada') ?></th>
                    <th><?= $this->Paginator->sort('actividad_id') ?></th>
                    <th><?= $this->Paginator->sort('trabajo_id') ?></th>
                    <th><?= $this->Paginator->sort('interseccion_id') ?></th>
                    <th><?= $this->Paginator->sort('estado_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?= $this->Number->format($tarea->id) ?></td>
                    <td><?= h($tarea->descripcion) ?></td>
                    <td><?= h($tarea->dificultad) ?></td>
                    <td><?= h($tarea->prioridad) ?></td>
                    <td><?= h($tarea->fecha_registro) ?></td>
                    <td><?= h($tarea->fecha_programada) ?></td>
                    <td><?= h($tarea->fecha_realizada) ?></td>
                    <td><?= $tarea->has('actividade') ? $this->Html->link($tarea->actividade->id, ['controller' => 'Actividades', 'action' => 'view', $tarea->actividade->id]) : '' ?></td>
                    <td><?= $tarea->has('trabajo') ? $this->Html->link($tarea->trabajo->id, ['controller' => 'Trabajos', 'action' => 'view', $tarea->trabajo->id]) : '' ?></td>
                    <td><?= $tarea->has('interseccione') ? $this->Html->link($tarea->interseccione->id, ['controller' => 'Intersecciones', 'action' => 'view', $tarea->interseccione->id]) : '' ?></td>
                    <td><?= $tarea->has('estado') ? $this->Html->link($tarea->estado->id, ['controller' => 'Estados', 'action' => 'view', $tarea->estado->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tarea->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tarea->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tarea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarea->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
