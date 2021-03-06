<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entry[]|\Cake\Collection\CollectionInterface $entries
 */

use Cake\Utility\Hash;

// $this->layout = 'tourist_blog'; // Override controller layout setting

?>

<?= $this->element('entry_filter', [
    'filter_data' => $filter_data
]); ?>

<div class="entries index large-9 medium-8 columns content">
    <h3><?= __('Entries') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
                <th scope="col"><?= $this->Paginator->sort('place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= __('country') ?></th>
                <th scope="col"><?= __('continent') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry): ?>
            <tr>
                <!-- <td><?= $this->Number->format($entry->id) ?></td> -->
                <td><?= $this->Html->link(h($entry->place), ['action' => 'view', $entry->id]) ?></td>
                <td><?= $entry->has('user') ? ( ($user_id === 1) ? $this->Html->link($entry->user->name, ['plugin' => 'UAC', 'controller' => 'Users', 'action' => 'view', $entry->user->id]) : $entry->user->name ) : '' ?></td>
                <td><?= h($entry->time) ?></td>
                <td><?= $entry->has('country') ? $this->Html->link($entry->country->name, ['controller' => 'Countries', 'action' => 'view', $entry->country->id]) : '' ?></td>
                <td><?= $entry->has('country') && $entry->country->has('continents') ? implode(', ', Hash::extract($entry->country->continents, '{n}.name')) : '' ?></td>                
                <td class="actions">
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['action' => 'edit', $entry->id], ['escape' => false, 'class' => 'btn btn-primary',]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-trash"></span>', ['action' => 'delete', $entry->id], ['escape' => false, 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $entry->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
