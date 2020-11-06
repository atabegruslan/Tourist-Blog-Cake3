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
                <img src="<?= $webroot . 'img/' . $entry->img_url ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Video') ?></th>
            <td>
                <video width="320" height="240" controls>
                    <source src="<?= $webroot . 'file/' . $entry->vid_url ?>">
                </video>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $entry->has('country') ? $this->Html->link($entry->country->name, ['controller' => 'Countries', 'action' => 'view', $entry->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $entry->has('user') ? $this->Html->link($entry->user->name, ['plugin' => 'UAC', 'controller' => 'Users', 'action' => 'view', $entry->user->id]) : '' ?></td>
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
