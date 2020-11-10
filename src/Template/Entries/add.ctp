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
            echo $this->Form->textarea('comments', ['rows' => 3]);

            echo $this->element('images_upload_customize', array(
                'name' => 'image',
                'label' => "Image",
            ));

            echo $this->Form->control('video', ['type' => 'file']);
            // echo $this->Form->input('video', ['type' => 'file', 'class' => 'form-control']);

            echo $this->Form->control('country_id', ['options' => $countries, 'empty' => true]);

            // echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->hidden('user_id', ['value' => $user_id]);

            // echo $this->Form->control('time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
