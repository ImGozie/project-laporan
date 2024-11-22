<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth\Authenticator::index', ['filter' => 'alreadyLoggedIn']);

$routes->group('login', ['filter' => 'alreadyLoggedIn'], function($routes) {
    $routes->get('', 'Auth\Authenticator::index');
    $routes->get('callback', 'Auth\Authenticator::oauthProcess');
    $routes->post('localAuth', 'Auth\Authenticator::localProcess');
});
$routes->get('auth/logout', 'Auth\Authenticator::logoutProcess');

$routes->get('/dashboard', 'Home\Dashboard::index', ['filter' => 'auth']);

$routes->group('users', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Users\Users::index');
    $routes->get('datatable', 'Users\Users::getUsersData');
    $routes->get('form', 'Users\Users::forms');
    $routes->get('form/(:any)', 'Users\Users::forms/$1');
    $routes->post('delete', 'Users\Users::deleteUser');
    $routes->post('add', 'Users\Users::addUser');
    $routes->post('update', 'Users\Users::updateUser');
});