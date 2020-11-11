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
                <td><?= $this->Html->link(h($countries->name), ['plugin' => null, 'controller' => 'Countries', 'action' => 'view', $countries->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['plugin' => null, 'controller' => 'Countries', 'action' => 'edit', $countries->id], ['escape' => false, 'class' => 'btn btn-primary',]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['plugin' => 'AdminPanel', 'controller' => 'Continents', 'action' => 'removeCountry', $continent->id, $countries->id], ['escape' => false, 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete {0}?', $countries->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
