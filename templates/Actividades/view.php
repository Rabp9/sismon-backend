<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade $actividade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Actividade'), ['action' => 'edit', $actividade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actividade'), ['action' => 'delete', $actividade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actividade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividades view content">
            <h3><?= h($actividade->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($actividade->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Actividades Tipo') ?></th>
                    <td><?= $actividade->has('actividades_tipo') ? $this->Html->link($actividade->actividades_tipo->id, ['controller' => 'ActividadesTipos', 'action' => 'view', $actividade->actividades_tipo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $actividade->has('user') ? $this->Html->link($actividade->user->id, ['controller' => 'Users', 'action' => 'view', $actividade->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Trabajadore') ?></th>
                    <td><?= $actividade->has('trabajadore') ? $this->Html->link($actividade->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $actividade->trabajadore->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= $actividade->has('estado') ? $this->Html->link($actividade->estado->id, ['controller' => 'Estados', 'action' => 'view', $actividade->estado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actividade->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Registro') ?></th>
                    <td><?= h($actividade->fecha_registro) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
