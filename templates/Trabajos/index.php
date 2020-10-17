<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trabajo[]|\Cake\Collection\CollectionInterface $trabajos
 */
?>
<div class="trabajos index content">
    <?= $this->Html->link(__('New Trabajo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trabajos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fecha_registro') ?></th>
                    <th><?= $this->Paginator->sort('estado_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trabajos as $trabajo): ?>
                <tr>
                    <td><?= $this->Number->format($trabajo->id) ?></td>
                    <td><?= h($trabajo->fecha_registro) ?></td>
                    <td><?= $trabajo->has('estado') ? $this->Html->link($trabajo->estado->id, ['controller' => 'Estados', 'action' => 'view', $trabajo->estado->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trabajo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trabajo->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trabajo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajo->id)]) ?>
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
