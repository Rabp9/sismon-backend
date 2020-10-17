<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesInterseccionesDetalle $actividadesInterseccionesDetalle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actividades Intersecciones Detalle'), ['action' => 'edit', $actividadesInterseccionesDetalle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividades Intersecciones Detalle'), ['action' => 'delete', $actividadesInterseccionesDetalle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesInterseccionesDetalle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividades Intersecciones Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividades Intersecciones Detalle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividadesInterseccionesDetalles view content">
            <h3><?= h($actividadesInterseccionesDetalle->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Actividade') ?></th>
                    <td><?= $actividadesInterseccionesDetalle->has('actividade') ? $this->Html->link($actividadesInterseccionesDetalle->actividade->id, ['controller' => 'Actividades', 'action' => 'view', $actividadesInterseccionesDetalle->actividade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Interseccione') ?></th>
                    <td><?= $actividadesInterseccionesDetalle->has('interseccione') ? $this->Html->link($actividadesInterseccionesDetalle->interseccione->id, ['controller' => 'Intersecciones', 'action' => 'view', $actividadesInterseccionesDetalle->interseccione->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actividadesInterseccionesDetalle->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Registro') ?></th>
                    <td><?= h($actividadesInterseccionesDetalle->fecha_registro) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
