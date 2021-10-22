<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

// Auth
// $routes->match(['get', 'post'], '/login', 'Auth::login');
// $routes->match(['get', 'post'], '/register', 'Auth::register');
$routes->get('/logout', 'Auth::logout');

// User
$routes->get('/', 'User::index');
$routes->get('/dashboard', 'User::profile');
$routes->get('/profile', 'User::profile');

// Carts & Favorite
$routes->get('/carts', 'Carts::index');
$routes->get('/checkout', 'Carts::checkout');
$routes->get('/favorites', 'Favorites::index');


// Product
$routes->get('/products', 'Product::products');
$routes->get('/product/detail/(:num)', 'Product::detail/$1');

// Category
$routes->get('/category/(:any)', 'Product::category/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
