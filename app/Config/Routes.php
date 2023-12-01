<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'CrudController::index');
$routes->get('/crud', 'CrudController::index');


$routes->get('/crud/create', 'CrudController::create');
$routes->post('/crud/store', 'CrudController::store');

$routes->get('/crud/edit/(:any)', 'CrudController::edit/$1');
$routes->post('/crud/update/(:any)', 'CrudController::update/$1');

$routes->get('/crud/delete/(:any)', 'CrudController::delete/$1');
