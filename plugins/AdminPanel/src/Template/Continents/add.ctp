<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $continent
 */
?>

<div class="continents form large-9 medium-8 columns content">
    <?= $this->Form->create($continent) ?>
    <fieldset>
        <legend><?= __('Add Continent') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('countries._ids', ['options' => $countries]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
