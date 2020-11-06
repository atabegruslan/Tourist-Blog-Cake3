<?php

$this->layout = 'uac';

?>

<h1>Login</h1>

<?= $this->Form->create(); ?>
<?= $this->Form->control('email'); ?>
<?= $this->Form->control('password'); ?>
<?= $this->Form->control('Login', ['type' => 'submit']); ?>
<?= $this->Form->end(); ?>

<?= $this->Html->link(__('Register'), ['plugin' => 'UAC', 'controller' => 'Users', 'action' => 'register']) ?>