<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->post('/register', 'Auth::register');
$routes->post('/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');


$routes->get('/home', 'Pages::showHomePage');
$routes->post('/cekHasil', 'Pages::cekHasil');

$routes->get('/histori', 'Pages::showHistori');

