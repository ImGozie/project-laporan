<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth\Authenticator::index', ['filter' => 'alreadyLoggedIn']);

$routes->get('/dashboard', 'Home\Dashboard::index', ['filter' => 'auth']);
$routes->get('/master', 'Master\Main::index', ['filter' => 'auth']);

$routes->group('manageform', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Forms\ManageForm::index');
    $routes->get('datatable', 'Forms\ManageForm::getFormData');
    $routes->post('delete', 'Forms\ManageForm::deleteJobinfo');
    $routes->post('update', 'Forms\ManageForm::updateJobinfo');
});

$routes->group('forms', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Forms\FormAlumni::index');
    $routes->post('submit', 'Forms\FormAlumni::submitForm');
    $routes->post('update', 'Forms\FormAlumni::updateJobinfo');
    $routes->get('getyear', 'Forms\FormAlumni::getYears');
});

$routes->group('login', ['filter' => 'alreadyLoggedIn'], function($routes) {
    $routes->get('', 'Auth\Authenticator::index');
    $routes->get('callback', 'Auth\Authenticator::oauthProcess');
    $routes->post('localAuth', 'Auth\Authenticator::localProcess');
});
$routes->get('auth/logout', 'Auth\Authenticator::logoutProcess');

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
$routes->get('jurusan/getjurusan', 'Master\Jurusan::getSelect');

$routes->group('currentstatus', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Master\CurrentStatus::index');
    $routes->get('datatable', 'Master\CurrentStatus::getCurrentStatusData');
    $routes->get('form', 'Master\CurrentStatus::forms');
    $routes->get('form/(:any)', 'Master\CurrentStatus::forms/$1');
    $routes->post('delete', 'Master\CurrentStatus::deleteCurrentStatus');
    $routes->post('add', 'Master\CurrentStatus::addCurrentStatus');
    $routes->post('update', 'Master\CurrentStatus::updateCurrentStatus');
});
$routes->get('currentstatus/getstatus', 'Master\CurrentStatus::getSelect');

$routes->group('jobinfo', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Master\Jobinfo::index');
    $routes->get('datatable', 'Master\Jobinfo::getJobinfoData');
    $routes->get('form', 'Master\Jobinfo::forms');
    $routes->get('form/(:any)', 'Master\Jobinfo::forms/$1');
    $routes->post('delete', 'Master\Jobinfo::deleteJobinfo');
    $routes->post('add', 'Master\Jobinfo::addJobinfo');
    $routes->post('update', 'Master\Jobinfo::updateJobinfo');
});
$routes->get('jobinfo/getjobinfo', 'Master\Jobinfo::getSelect');