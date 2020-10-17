<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Interseccione $interseccione
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Interseccione'), ['action' => 'edit', $interseccione->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Interseccione'), ['action' => 'delete', $interseccione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $interseccione->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Intersecciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Interseccione'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="intersecciones view content">
            <h3><?= h($interseccione->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Descripcion') ?></th>
                    <td><?= h($interseccione->descripcion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= h($interseccione->codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= $interseccione->has('estado') ? $this->Html->link($interseccione->estado->id, ['controller' => 'Estados', 'action' => 'view', $interseccione->estado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($interseccione->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Longitud') ?></th>
                    <td><?= $this->Number->format($interseccione->longitud) ?></td>
                </tr>
                <tr>
                    <th><?= __('Latitud') ?></th>
                    <td><?= $this->Number->format($interseccione->latitud) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
