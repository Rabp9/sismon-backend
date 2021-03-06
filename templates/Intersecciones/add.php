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
            <?= $this->Html->link(__('List Intersecciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="intersecciones form content">
            <?= $this->Form->create($interseccione) ?>
            <fieldset>
                <legend><?= __('Add Interseccione') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('longitud');
                    echo $this->Form->control('latitud');
                    echo $this->Form->control('codigo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
