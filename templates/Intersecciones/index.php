<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Interseccione[]|\Cake\Collection\CollectionInterface $intersecciones
 */
?>
<div class="intersecciones index content">
    <?= $this->Html->link(__('New Interseccione'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Intersecciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('descripcion') ?></th>
                    <th><?= $this->Paginator->sort('longitud') ?></th>
                    <th><?= $this->Paginator->sort('latitud') ?></th>
                    <th><?= $this->Paginator->sort('codigo') ?></th>
                    <th><?= $this->Paginator->sort('estado_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($intersecciones as $interseccione): ?>
                <tr>
                    <td><?= $this->Number->format($interseccione->id) ?></td>
                    <td><?= h($interseccione->descripcion) ?></td>
                    <td><?= $this->Number->format($interseccione->longitud) ?></td>
                    <td><?= $this->Number->format($interseccione->latitud) ?></td>
                    <td><?= h($interseccione->codigo) ?></td>
                    <td><?= $interseccione->has('estado') ? $this->Html->link($interseccione->estado->id, ['controller' => 'Estados', 'action' => 'view', $interseccione->estado->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $interseccione->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $interseccione->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $interseccione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $interseccione->id)]) ?>
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
