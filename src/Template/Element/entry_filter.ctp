<?php 

echo $this->Form->create(null, [
    'url'   => ['controller' => 'entries', 'action' => 'index'],
    'type'  => 'get',
    'class' => 'form-inline',
]);

echo $this->Form->input('place', [
    'class' => 'form-control',
    'label' => __('place'),
    'value' => isset($filter_data["place"]) ? $filter_data["place"] : '',
]);

echo $this->Form->button(__('filter'), ['class' => 'btn btn-primary',]);

echo $this->Html->link(__('reset'), ['controller' => 'entries', 'action' => 'index'], ['class' => 'btn btn-danger',]);

echo $this->Form->end();
