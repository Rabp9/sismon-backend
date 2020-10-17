<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TareasTrabajadoresDetalle $tareasTrabajadoresDetalle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tareasTrabajadoresDetalle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tareasTrabajadoresDetalle->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tareas Trabajadores Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tareasTrabajadoresDetalles form content">
            <?= $this->Form->create($tareasTrabajadoresDetalle) ?>
            <fieldset>
                <legend><?= __('Edit Tareas Trabajadores Detalle') ?></legend>
                <?php
                    echo $this->Form->control('fecha_realizada');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
