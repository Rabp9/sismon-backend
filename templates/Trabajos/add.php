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
            <?= $this->Html->link(__('List Trabajos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="trabajos form content">
            <?= $this->Form->create($trabajo) ?>
            <fieldset>
                <legend><?= __('Add Trabajo') ?></legend>
                <?php
                    echo $this->Form->control('fecha_registro');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
