<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', function (RouteCollection $routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/san-pham','Products::index');
    $routes->get('products/(:segment)','Products::getProductByID/$1');
    $routes->get('san-pham/(:segment)','Products::getAllProductByKey/$1');
    $routes->get('cart','CartController::index');
    $routes->post('addCart','Products::addCart');
    $routes->get('ajax/delProduct/(:segment)','CartController::delProduct/$1');
});
$routes->group('buyer',function(RouteCollection $routes){
    $routes->get('login','Buyer::login');
    $routes->post('login_process','Buyer::login_process');
    $routes->get('register','Buyer::register');
    $routes->post('registration','Buyer::registration');
    $routes->get('logout','Buyer::logout');
});
// $routes->get('/', 'Home::index');
// $routes->get('/san-pham','Category::index');
