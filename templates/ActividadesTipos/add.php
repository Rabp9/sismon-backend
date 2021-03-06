<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesTipo $actividadesTipo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Actividades Tipos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividadesTipos form content">
            <?= $this->Form->create($actividadesTipo) ?>
            <fieldset>
                <legend><?= __('Add Actividades Tipo') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
