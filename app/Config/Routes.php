<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Front');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/admin', 'Admin::index');
$routes->get('/login', 'Login::index');
$routes->get('/daftar/', 'Login::daftar');
$routes->get('/cari', 'Front::cariproduk');
$routes->get('/blog', 'Blog::index');
$routes->get('/konsultasi', 'Front::konsultasi');
$routes->get('/account', 'Account::index');

$routes->group('/', function ($routes) {
	$routes->add('', 'Front::index');
	$routes->add('product/', 'Front::all_products');
	$routes->add('product/(:any)/', 'Front::all_products/$1');
	$routes->get('product/(:any)/(:any)/', 'Front::show_product/$1/$2');
});


$routes->get('/admin-test', 'Front::test');
$routes->get('/front-test', 'Front::test');
/**
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
