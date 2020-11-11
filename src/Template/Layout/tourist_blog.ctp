<?php

/**
 * Copied from \vendor\friendsofcake\bootstrap-ui\src\Template\Layout\default.ctp
 */

use Cake\Core\Configure;

/**
 * Default `html` block.
 */
if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s" class="no-js">', Configure::read('App.language'));
    $this->end();
}

/**
 * Default `title` block.
 */
if (!$this->fetch('title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}

/**
 * Default `footer` block.
 */
if (!$this->fetch('tb_footer')) {
    $this->start('tb_footer');
    //printf('&copy;%s %s', date('Y'), Configure::read('App.title'));
    $this->end();
}

/**
 * Default `body` block.
 */
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->getParam('controller'), $this->request->getParam('action')]) . '" ');
if (!$this->fetch('tb_body_start')) {
    $this->start('tb_body_start');
    echo '<body' . $this->fetch('tb_body_attrs') . '>';
    $this->end();
}
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash)) {
        echo $this->Flash->render();
    }
    $this->end();
}
if (!$this->fetch('tb_body_end')) {
    $this->start('tb_body_end');
    echo '</body>';
    $this->end();
}

/**
 * Prepend `meta` block with `author` and `favicon`.
 */
$this->prepend('meta', $this->Html->meta('author', null, ['name' => 'author', 'content' => Configure::read('App.author')]));
$this->prepend('meta', $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']));

/**
 * Prepend `css` block with Bootstrap stylesheets and append
 * the `$html5Shim`.
 */
$html5Shim =
<<<HTML

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
HTML;
$this->prepend('css', $this->Html->css(['bootstrap/bootstrap', 'travel_blog']));

$this->append('css', $html5Shim);

/**
 * Prepend `script` block with jQuery and Bootstrap scripts
 */
$this->prepend('script', $this->Html->script(['jquery/jquery', 'bootstrap/bootstrap']));

?>
<!DOCTYPE html>

<?= $this->fetch('html') ?>

    <head>

        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <title><?= $this->fetch('title') ?></title>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>

        <?= $this->Html->css('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
<!-- 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js"></script>
 -->
    </head>

    <?php
    echo $this->fetch('tb_body_start');
    echo $this->fetch('tb_flash');
    ?>

    <nav class="navbar navbar-light">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link(__('Entries'), ['controller' => 'Entries', 'action' => 'index']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('New Entry'), ['controller' => 'Entries', 'action' => 'add']) ?>
                </li>

                <li class="nav-item">
                    <?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?>
                </li>

                <li class="nav-item active">
                    <?= $this->Html->link(__('Logout'), ['plugin' => 'UAC', 'controller' => 'Users', 'action' => 'logout']) ?>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
    <?php echo $this->fetch('content'); ?>
    </div>

    <?php
    echo $this->fetch('tb_footer');

    echo $this->fetch('script');

    echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js');

    echo $this->fetch('tb_body_end');
    ?>

</html>
