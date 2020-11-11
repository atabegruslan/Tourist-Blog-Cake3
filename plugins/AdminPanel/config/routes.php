<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'AdminPanel',
    ['path' => '/admin-panel'],
    function (RouteBuilder $routes) {
    	$routes->connect('/', ['controller' => 'Continents', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    }
);
