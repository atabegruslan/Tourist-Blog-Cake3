<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entry $entry
 */
?>

<div class="entries form large-9 medium-8 columns content">
    <?= $this->Form->create($entry) ?>
    <fieldset>
        <legend><?= __('Edit Entry') ?></legend>
        <?php
            echo $this->Form->control('place');
            echo $this->Form->control('comments');
            echo $this->Form->control('img_url');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
