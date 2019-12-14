<h1>Login</h1>

<?= $this->Form->create(); ?>
<?= $this->Form->control('email'); ?>
<?= $this->Form->control('password'); ?>
<?= $this->Form->control('Login', ['type' => 'submit']); ?>
<?= $this->Form->end(); ?>

<?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'register']) ?>