<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $continent
 */
?>

<div class="continents view large-9 medium-8 columns content">
    <h3><?= h($continent->name) ?></h3>

    <div class="related">
        <h4><?= __('Countries') ?></h4>
        <?php if (!empty($continent->countries)): ?>
        <table class="table">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($continent->countries as $countries): ?>
            <tr>
                <td><?= h($countries->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['plugin' => null, 'controller' => 'Countries', 'action' => 'view', $countries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['plugin' => null, 'controller' => 'Countries', 'action' => 'edit', $countries->id]) ?>
                    <?= $this->Form->postLink(__('Remove'), ['plugin' => 'AdminPanel', 'controller' => 'Continents', 'action' => 'removeCountry', $continent->id, $countries->id], ['confirm' => __('Are you sure you want to delete {0}?', $countries->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
