<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $continents
 */
?>

<div class="continents index large-9 medium-8 columns content">
    <h3><?= __('Continents') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($continents as $continent): ?>
            <tr>
                <td><?= $this->Html->link(h($continent->name), ['action' => 'view', $continent->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['action' => 'edit', $continent->id], ['escape' => false, 'class' => 'btn btn-primary',]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-trash"></span>', ['action' => 'delete', $continent->id], ['escape' => false, 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $continent->id)]) ?>
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
