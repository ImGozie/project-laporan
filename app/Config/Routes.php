<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('account', function($routes) {
    $routes->get('login', 'Auth\Login::index');
    $routes->get('callback', 'Auth\Login::oauthProccess');
    $routes->get('localAuth', 'Auth\Login::localProccess');
    $routes->post('submit', 'Auth\Login::submit');
});