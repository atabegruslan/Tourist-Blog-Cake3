<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $continent
 */
?>

<div class="continents view large-9 medium-8 columns content">
    <h3><?= h($continent->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($continent->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($continent->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Countries') ?></h4>
        <?php if (!empty($continent->countries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($continent->countries as $countries): ?>
            <tr>
                <td><?= h($countries->id) ?></td>
                <td><?= h($countries->name) ?></td>
                <td><?= h($countries->slug) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Countries', 'action' => 'view', $countries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Countries', 'action' => 'edit', $countries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Countries', 'action' => 'delete', $countries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $countries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
