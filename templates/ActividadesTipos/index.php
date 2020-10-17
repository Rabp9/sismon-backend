<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesTipo[]|\Cake\Collection\CollectionInterface $actividadesTipos
 */
?>
<div class="actividadesTipos index content">
    <?= $this->Html->link(__('New Actividades Tipo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades Tipos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('estado_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividadesTipos as $actividadesTipo): ?>
                <tr>
                    <td><?= $this->Number->format($actividadesTipo->id) ?></td>
                    <td><?= h($actividadesTipo->descripcion) ?></td>
                    <td><?= $actividadesTipo->has('estado') ? $this->Html->link($actividadesTipo->estado->id, ['controller' => 'Estados', 'action' => 'view', $actividadesTipo->estado->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actividadesTipo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividadesTipo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividadesTipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesTipo->id)]) ?>
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
