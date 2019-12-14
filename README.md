# CakePHP 3.8

## Tutorials

- Official Documentation: https://book.cakephp.org/3/en/index.html 
- http://www.w3programmers.com/category/cakephp/ (Old, but good reference)
- https://www.youtube.com/playlist?list=PLnBvgoOXZNCMdw9s1E6StlXaYZz0xti4n (v3.4)
- https://www.youtube.com/playlist?list=PLmrTMUhqzS3gJzugIEBKwHyG1SJIiN8nU (v3.6)
- https://www.youtube.com/playlist?list=PLrOp29ATDP7ZhqPSsZNCFlBJpnv38vuZg 
- https://www.youtube.com/playlist?list=PLmrTMUhqzS3jZEhNrrysfYAJUNFjjDqmB
- https://www.youtube.com/playlist?list=PLsoBxH455yoZExk1_J3QxbW5F1F0MJJez
- https://www.youtube.com/playlist?list=PLWov0H-mAq9inDqfhh3hFbKYpv3P6p1_d

## Preliminaries

Include php intl extension in `php.ini`

## Install

### via CLI:

`composer create-project --prefer-dist cakephp/app tourist_blog`

### Or via NetBeans: 

http://www.imi21.com/cakephp-3-addressbook-1/

1. download 'org-netbeans-modules-php-cake3-0.4.0.nbm' from https://github.com/junichi11/cakephp3-netbeans/releases (https://github.com/junichi11/cakephp3-netbeans)

2. Tools > Plugins > Downloaded > Add Plugins > the .nbm

3. New PHP project, cakephp 3 framework project

4. right click project > composer > update(dev)

## Checks

- `config/app.php`
	- Security salt
	- DB Credentials

```php
'Datasources' => [
    'default' => [
    	'host' => '***',
        'username' => '***',
        'password' => '***',
        'database' => '***',
```

## Database

Create DB `tourist_blog.sql`

### Note: Naming conventions:

|     |     |
| --- | --- |
| Database Table | entries |
| Model class | src/Model/Entry.php |
| Controller class | src/Controller/EntryController.php |
| View template | src/Template/Entries/(CRUD).ctp |
| URL | {domain-name}/tourist_blog/entries/ |

## Scaffold

`bin/cake bake all entries` (use plural "entries")

Now the entire basics of the Entry CRUD is done. See `{domain-name}/tourist_blog/entries/`

## Login

`bin/cake bake all users`

`src/Controller/AppController.php`
```php
$this->loadComponent('Auth', [
    'authenticate' => [
        'Form' => [
            'fields' => [
                'username' => 'email',
                'password' => 'password'
            ]
        ]
    ],
    'loginAction' => [
        'controller' => 'Users',
        'action' => 'login'
    ]
]);
```

`src/Model/Entity/User.php`
```php
protected function _setPassword($value) {
    return (new DefaultPasswordHasher)->hash($value);
}
```

`src/Controller/UsersController`
```php
public function login()
{
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }

        $this->Flash->error('Your username or password is incorrect');
    }
}

public function logout()
{
    $this->Flash->success('Logged out');
    return $this->redirect($this->Auth->logout());
}
```

`src/Template/Users/login.ctp`
```html
<h1>Login</h1>

<?= $this->Form->create(); ?>
<?= $this->Form->input('email'); ?>
<?= $this->Form->input('password'); ?>
<?= $this->Form->button('Login'); ?>
<?= $this->Form->end(); ?>
```

## Sign Up

Alterations to UserController:

```php
use Cake\Event\Event;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        // tell Auth not to check authentication when doing the 'register' action
        $this->Auth->allow('register');
    }

    public function login()
    {
        if ($this->Auth->user()) { // if already logged in
            return $this->redirect('/entries/');
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Hello ' . $this->Auth->user('name')));   

                //return $this->redirect($this->Auth->redirectUrl());
                return $this->redirect('/entries/');
            }

            $this->Flash->error('Your username or password is incorrect');
        }
    }

    public function logout()
    {
        $this->Flash->success('Logged out');
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    { 
        if ($this->Auth->user()) { // if already logged in
            return $this->redirect('/entries/');
        }

        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();

            $userData = $this->request->getData();

            if ($userData['password'] === $userData['password_confirm']) { 
                unset($userData['password_confirm']);
                $userData['type'] = 'normal';

                $user = $this->Users->patchEntity($user, $userData);

                if ($this->Users->save($user)) { 
                    $this->Auth->setUser($user->toArray());
                    $this->Flash->success(__('Hello ' . $this->Auth->user('name')));

                    //return $this->redirect($this->Auth->redirectUrl());
                    return $this->redirect('/entries/');
                }
                $this->Flash->error(__('The user has NOT been saved.')); 
            }
            $this->Flash->error(__('Password confirmation failure.')); 
        }
    }
```

`src/Template/User/register.ctp`
```html
<h1>User Registration</h1>

<?= $this->Form->create(); ?>
<?= $this->Form->control('name'); ?>
<?= $this->Form->control('email'); ?>
<?= $this->Form->control('password', array('type' => 'password')); ?>
<?= $this->Form->control('password_confirm', array('type' => 'password')); ?>
<?= $this->Form->control('Signup', ['type' => 'submit']); ?>
<?= $this->Form->end(); ?>

<?= $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']) ?>
```

Add `<?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'register']) ?>` to login.ctp

Add `<?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?>` to pages inside login

### Helpful Tutorials:

- http://alvinalexander.com/php/cakephp-user-registration-form-example-recipe


## Bootstrap plugin

### For CakePHP 2

https://slywalker.github.io/cakephp-plugin-boost_cake/

In app/composer.json

```js
"require": {
	"slywalker/boost_cake": "*"
}
```

In CLI in app folder: `composer install`

In app/Config/bootstrap.php, add: `CakePlugin::load('BoostCake');`

In AppController

```php
class AppController extends Controller {

	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);

}
```

Helpful link: http://stackoverflow.com/questions/22213522/using-slywalkers-twitter-bootstrap-as-a-plugin-in-cakephp

In view/layouts/default.ctp, inside head tags:

```php
<title>...</title>

<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('bootstrap.min');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
?>

<?php echo $this->Html->script("jquery.min") ?>
<?php echo $this->Html->script("bootstrap.min") ?>
```

In index view ctp (for example):

```php
<?php echo $this->Form->create('BoostCake', array(
	'inputDefaults' => array(
		'div' => 'form-group',
		'label' => false,
		'wrapInput' => false,
		'class' => 'form-control'
	),
	'class' => 'well form-inline'
)); ?>

	<?php echo $this->Form->input('email', array(
		'placeholder' => 'Email'
	)); ?>
	<?php echo $this->Form->input('password', array(
		'placeholder' => 'Password'
	)); ?>
	<?php echo $this->Form->input('remember', array(
		'div' => 'checkbox',
		'class' => false,
		'label' => 'Remember me'
	)); ?>
	<?php echo $this->Form->submit('Sign in', array(
		'div' => 'form-group',
		'class' => 'btn btn-default'
	)); ?>

<?php echo $this->Form->end(); ?>      
```

### For CakePHP 3

https://github.com/friendsofcake/bootstrap-ui

In CLI:

```
composer require friendsofcake/bootstrap-ui

bin/cake plugin load BootstrapUI
```

In src\View\AppView.php

```php
use BootstrapUI\View\UIView; // use UIView

class AppView extends UIView // extend UIView
{
    public function initialize()
    {
        parent::initialize(); // add this line
    }
}
```

Add jquery and bootstrap into `webroot/js/jquery/jquery.js`, `webroot/js/bootstrap/bootstrap.js` and `webroot/css/bootstrap/bootstrap.css`

In login.ctp (for example):

```php
<?= $this->Form->create(); ?>
<?= $this->Form->control('email'); ?>
<?= $this->Form->control('password'); ?>
<?= $this->Form->control('Login', ['type' => 'submit']); ?>
```