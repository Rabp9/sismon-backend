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
            <?= $this->Html->link(__('List Tareas Trabajadores Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tareasTrabajadoresDetalles form content">
            <?= $this->Form->create($tareasTrabajadoresDetalle) ?>
            <fieldset>
                <legend><?= __('Add Tareas Trabajadores Detalle') ?></legend>
                <?php
                    echo $this->Form->control('fecha_realizada');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
