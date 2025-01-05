<?php

use App\Controllers\CategoryController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/home', 'ProductController::index');

$routes->get('/product', 'ProductController::listProducts');

$routes->get('/delete-all', 'ProductController::deleteAll');

$routes->get('/create', 'ProductController::createProduct');

$routes->post('/add-new', 'ProductController::addNewProduct');

$routes->get('/edit/(:any)', 'ProductController::infoProduct/$1');

$routes->post('/save-edit', 'ProductController::saveProduct');

$routes->get('/delete/(:any)', 'ProductController::deleteProduct/$1');

// category
$routes->group('/category', function($routes) {
    $routes->get('/', 'CategoryController::index');
    $routes->get('create', 'CategoryController::createCate');
    $routes->post('save-create', 'CategoryController::saveCreateCate');
    $routes->get('edit/(:any)', 'CategoryController::editCate/$1');
    $routes->post('save-edit', 'CategoryController::saveEditCate');
    $routes->get('delete/(:any)', 'CategoryController::deleteCate/$1');
});




