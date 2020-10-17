<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesTipo $actividadesTipo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actividades Tipo'), ['action' => 'edit', $actividadesTipo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividades Tipo'), ['action' => 'delete', $actividadesTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesTipo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividades Tipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividades Tipo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividadesTipos view content">
            <h3><?= h($actividadesTipo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($actividadesTipo->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= $actividadesTipo->has('estado') ? $this->Html->link($actividadesTipo->estado->id, ['controller' => 'Estados', 'action' => 'view', $actividadesTipo->estado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actividadesTipo->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
