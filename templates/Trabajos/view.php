<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trabajo $trabajo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Trabajo'), ['action' => 'edit', $trabajo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Trabajo'), ['action' => 'delete', $trabajo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trabajo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Trabajos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Trabajo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trabajos view content">
            <h3><?= h($trabajo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= $trabajo->has('estado') ? $this->Html->link($trabajo->estado->id, ['controller' => 'Estados', 'action' => 'view', $trabajo->estado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($trabajo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Registro') ?></th>
                    <td><?= h($trabajo->fecha_registro) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
