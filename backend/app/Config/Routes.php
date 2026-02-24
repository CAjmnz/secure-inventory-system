<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('api', function($routes) {
    $routes->get('health','HealthController::index');

});
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']); // We'll create Dashboard later
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    $routes->get('users', 'Admin::users');
});

$routes->group('inventory', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Inventory::index');
    $routes->get('create', 'Inventory::create', ['filter' => 'auth:admin,staff']);
    $routes->post('store', 'Inventory::store', ['filter' => 'auth:admin,staff']);
    $routes->get('edit/(:num)', 'Inventory::edit/$1', ['filter' => 'auth:admin']);
    $routes->post('update/(:num)', 'Inventory::update/$1', ['filter' => 'auth:admin']);
    $routes->get('delete/(:num)', 'Inventory::delete/$1', ['filter' => 'auth:admin']);
});


