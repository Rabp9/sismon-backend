<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade[]|\Cake\Collection\CollectionInterface $actividades
 */
?>
<div class="actividades index content">
    <?= $this->Html->link(__('New Actividade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('fecha_registro') ?></th>
                    <th><?= $this->Paginator->sort('actividades_tipo_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('trabajador_id') ?></th>
                    <th><?= $this->Paginator->sort('estado_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividades as $actividade): ?>
                <tr>
                    <td><?= $this->Number->format($actividade->id) ?></td>
                    <td><?= h($actividade->descripcion) ?></td>
                    <td><?= h($actividade->fecha_registro) ?></td>
                    <td><?= $actividade->has('actividades_tipo') ? $this->Html->link($actividade->actividades_tipo->id, ['controller' => 'ActividadesTipos', 'action' => 'view', $actividade->actividades_tipo->id]) : '' ?></td>
                    <td><?= $actividade->has('user') ? $this->Html->link($actividade->user->id, ['controller' => 'Users', 'action' => 'view', $actividade->user->id]) : '' ?></td>
                    <td><?= $actividade->has('trabajadore') ? $this->Html->link($actividade->trabajadore->id, ['controller' => 'Trabajadores', 'action' => 'view', $actividade->trabajadore->id]) : '' ?></td>
                    <td><?= $actividade->has('estado') ? $this->Html->link($actividade->estado->id, ['controller' => 'Estados', 'action' => 'view', $actividade->estado->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actividade->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividade->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividade->id)]) ?>
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
