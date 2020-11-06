<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entry $entry
 */
?>

<div class="entries view large-9 medium-8 columns content">
    <h3><?= h($entry->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Place') ?></th>
            <td><?= h($entry->place) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comments') ?></th>
            <td><?= h($entry->comments) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td>
                <img src="<?= $this->webroot . 'img/' . $entry->img_url ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $entry->has('user') ? $this->Html->link($entry->user->name, ['controller' => 'Users', 'action' => 'view', $entry->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($entry->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($entry->time) ?></td>
        </tr>
    </table>
</div>
