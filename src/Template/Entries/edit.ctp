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

            echo $this->element('images_upload_customize', array(
                'name' => 'image',
                'label' => 'Image',
                'webroot' => $webroot,
                'img_review_url' => $entry->img_url,
            ));

            echo $this->Form->control('video', ['type' => 'file']);
        ?>

        <video width="320" height="240" controls>
            <source src="<?= $webroot . 'file/' . $entry->vid_url ?>">
        </video>

        <?php
            echo $this->Form->hidden('user_id', ['value' => $entry->user_id]);
            
            //echo $this->Form->control('time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
