<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tarea $tarea
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tareas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tareas form content">
            <?= $this->Form->create($tarea) ?>
            <fieldset>
                <legend><?= __('Add Tarea') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('dificultad');
                    echo $this->Form->control('prioridad');
                    echo $this->Form->control('fecha_registro');
                    echo $this->Form->control('fecha_programada');
                    echo $this->Form->control('fecha_realizada', ['empty' => true]);
                    echo $this->Form->control('trabajo_id', ['options' => $trabajos, 'empty' => true]);
                    echo $this->Form->control('interseccion_id', ['options' => $intersecciones, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
