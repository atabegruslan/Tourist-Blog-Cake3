<?php

$this->layout = 'uac';

?>

<h1>User Registration</h1>

<?= $this->Form->create(); ?>
<?= $this->Form->control('name'); ?>
<?= $this->Form->control('email'); ?>
<?= $this->Form->control('password', array('type' => 'password')); ?>
<?= $this->Form->control('password_confirm', array('type' => 'password')); ?>
<?= $this->Form->control('Signup', ['type' => 'submit']); ?>
<?= $this->Form->end(); ?>

<?= $this->Html->link(__('Login'), ['plugin' => 'UAC', 'controller' => 'Users', 'action' => 'login']) ?>