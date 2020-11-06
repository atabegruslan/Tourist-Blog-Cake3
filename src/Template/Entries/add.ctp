<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entry $entry
 */
?>

<div class="entries form large-9 medium-8 columns content">
    <?= $this->Form->create($entry, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Entry') ?></legend>
        <?php
            echo $this->Form->control('place');
            echo $this->Form->control('comments');

            echo $this->element('images_upload_customize', array(
                'name' => 'image',
                'label' => "Image",
            ));

            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
