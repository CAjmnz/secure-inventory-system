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