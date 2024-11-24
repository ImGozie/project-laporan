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
$routes->get('/master', 'Master\Main::index', ['filter' => 'auth']);

$routes->group('users', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Users\Users::index');
    $routes->get('datatable', 'Users\Users::getUsersData');
    $routes->get('form', 'Users\Users::forms');
    $routes->get('form/(:any)', 'Users\Users::forms/$1');
    $routes->post('delete', 'Users\Users::deleteUser');
    $routes->post('add', 'Users\Users::addUser');
    $routes->post('update', 'Users\Users::updateUser');
});
$routes->group('jurusan', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Master\Jurusan::index');
    $routes->get('datatable', 'Master\Jurusan::getJurusanData');
    $routes->get('form', 'Master\Jurusan::forms');
    $routes->get('form/(:any)', 'Master\Jurusan::forms/$1');
    $routes->post('delete', 'Master\Jurusan::deleteJurusan');
    $routes->post('add', 'Master\Jurusan::addJurusan');
    $routes->post('update', 'Master\Jurusan::updateJurusan');
});
$routes->group('currentstatus', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Master\CurrentStatus::index');
    $routes->get('datatable', 'Master\CurrentStatus::getCurrentstatusData');
    $routes->get('form', 'Master\CurrentStatus::forms');
    $routes->get('form/(:any)', 'Master\CurrentStatus::forms/$1');
    $routes->post('delete', 'Master\CurrentStatus::deleteCurrentstatus');
    $routes->post('add', 'Master\CurrentStatus::addCurrentstatus');
    $routes->post('update', 'Master\CurrentStatus::updateCurrentstatus');
});