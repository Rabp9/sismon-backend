<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActividadesInterseccionesDetalle $actividadesInterseccionesDetalle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actividadesInterseccionesDetalle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actividadesInterseccionesDetalle->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Actividades Intersecciones Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actividadesInterseccionesDetalles form content">
            <?= $this->Form->create($actividadesInterseccionesDetalle) ?>
            <fieldset>
                <legend><?= __('Edit Actividades Intersecciones Detalle') ?></legend>
                <?php
                    echo $this->Form->control('fecha_registro');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
