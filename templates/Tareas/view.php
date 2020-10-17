<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarea $tarea
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tarea'), ['action' => 'edit', $tarea->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tarea'), ['action' => 'delete', $tarea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tarea->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tareas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tarea'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tareas view content">
            <h3><?= h($tarea->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($tarea->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dificultad') ?></th>
                    <td><?= h($tarea->dificultad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prioridad') ?></th>
                    <td><?= h($tarea->prioridad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actividade') ?></th>
                    <td><?= $tarea->has('actividade') ? $this->Html->link($tarea->actividade->id, ['controller' => 'Actividades', 'action' => 'view', $tarea->actividade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Trabajo') ?></th>
                    <td><?= $tarea->has('trabajo') ? $this->Html->link($tarea->trabajo->id, ['controller' => 'Trabajos', 'action' => 'view', $tarea->trabajo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Interseccione') ?></th>
                    <td><?= $tarea->has('interseccione') ? $this->Html->link($tarea->interseccione->id, ['controller' => 'Intersecciones', 'action' => 'view', $tarea->interseccione->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= $tarea->has('estado') ? $this->Html->link($tarea->estado->id, ['controller' => 'Estados', 'action' => 'view', $tarea->estado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tarea->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Registro') ?></th>
                    <td><?= h($tarea->fecha_registro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Programada') ?></th>
                    <td><?= h($tarea->fecha_programada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Realizada') ?></th>
                    <td><?= h($tarea->fecha_realizada) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
