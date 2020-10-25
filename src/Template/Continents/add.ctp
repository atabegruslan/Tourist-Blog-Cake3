<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Continent $continent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Continents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
    </ul>
</nav>
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
