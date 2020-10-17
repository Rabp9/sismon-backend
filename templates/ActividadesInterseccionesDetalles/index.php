<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesInterseccionesDetalle[]|\Cake\Collection\CollectionInterface $actividadesInterseccionesDetalles
 */
?>
<div class="actividadesInterseccionesDetalles index content">
    <?= $this->Html->link(__('New Actividades Intersecciones Detalle'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades Intersecciones Detalles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fecha_registro') ?></th>
                    <th><?= $this->Paginator->sort('actividad_id') ?></th>
                    <th><?= $this->Paginator->sort('interseccion_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividadesInterseccionesDetalles as $actividadesInterseccionesDetalle): ?>
                <tr>
                    <td><?= $this->Number->format($actividadesInterseccionesDetalle->id) ?></td>
                    <td><?= h($actividadesInterseccionesDetalle->fecha_registro) ?></td>
                    <td><?= $actividadesInterseccionesDetalle->has('actividade') ? $this->Html->link($actividadesInterseccionesDetalle->actividade->id, ['controller' => 'Actividades', 'action' => 'view', $actividadesInterseccionesDetalle->actividade->id]) : '' ?></td>
                    <td><?= $actividadesInterseccionesDetalle->has('interseccione') ? $this->Html->link($actividadesInterseccionesDetalle->interseccione->id, ['controller' => 'Intersecciones', 'action' => 'view', $actividadesInterseccionesDetalle->interseccione->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actividadesInterseccionesDetalle->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividadesInterseccionesDetalle->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividadesInterseccionesDetalle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesInterseccionesDetalle->id)]) ?>
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
