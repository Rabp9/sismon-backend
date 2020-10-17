<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TareasTrabajadoresDetalle[]|\Cake\Collection\CollectionInterface $tareasTrabajadoresDetalles
 */
?>
<div class="tareasTrabajadoresDetalles index content">
    <?= $this->Html->link(__('New Tareas Trabajadores Detalle'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tareas Trabajadores Detalles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fecha_realizada') ?></th>
                    <th><?= $this->Paginator->sort('tarea_id') ?></th>
                    <th><?= $this->Paginator->sort('trabajador_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareasTrabajadoresDetalles as $tareasTrabajadoresDetalle): ?>
                <tr>
                    <td><?= $this->Number->format($tareasTrabajadoresDetalle->id) ?></td>
                    <td><?= h($tareasTrabajadoresDetalle->fecha_realizada) ?></td>
                    <td><?= $tareasTrabajadoresDetalle->has('tarea') ? $this->Html->link($tareasTrabajadoresDetalle->tarea->id, ['controller' => 'Tareas', 'action' => 'view', $tareasTrabajadoresDetalle->tarea->id]) : '' ?></td>
                    <td><?= $tareasTrabajadoresDetalle->has('trabajadore') ? $this->Html->link($tareasTrabajadoresDetalle->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $tareasTrabajadoresDetalle->trabajadore->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tareasTrabajadoresDetalle->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tareasTrabajadoresDetalle->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tareasTrabajadoresDetalle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tareasTrabajadoresDetalle->id)]) ?>
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
