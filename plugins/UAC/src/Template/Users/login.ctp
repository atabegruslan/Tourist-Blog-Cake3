<?php

$this->layout = 'uac';

?>

<h1>Login</h1>

<?= $this->Form->create(); ?>
<?= $this->Form->control('email'); ?>
<?= $this->Form->control('password'); ?>
<?= $this->Form->button('Login', ['type' => 'submit']); ?>
<?= $this->Html->link(__('Register'), ['plugin' => 'UAC', 'controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-default',]) ?>
<?= $this->Form->end(); ?>
