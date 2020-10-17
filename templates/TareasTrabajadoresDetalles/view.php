<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TareasTrabajadoresDetalle $tareasTrabajadoresDetalle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tareas Trabajadores Detalle'), ['action' => 'edit', $tareasTrabajadoresDetalle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tareas Trabajadores Detalle'), ['action' => 'delete', $tareasTrabajadoresDetalle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tareasTrabajadoresDetalle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tareas Trabajadores Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tareas Trabajadores Detalle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tareasTrabajadoresDetalles view content">
            <h3><?= h($tareasTrabajadoresDetalle->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tarea') ?></th>
                    <td><?= $tareasTrabajadoresDetalle->has('tarea') ? $this->Html->link($tareasTrabajadoresDetalle->tarea->id, ['controller' => 'Tareas', 'action' => 'view', $tareasTrabajadoresDetalle->tarea->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Trabajadore') ?></th>
                    <td><?= $tareasTrabajadoresDetalle->has('trabajadore') ? $this->Html->link($tareasTrabajadoresDetalle->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $tareasTrabajadoresDetalle->trabajadore->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tareasTrabajadoresDetalle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Realizada') ?></th>
                    <td><?= h($tareasTrabajadoresDetalle->fecha_realizada) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
