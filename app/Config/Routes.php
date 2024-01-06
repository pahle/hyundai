<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mobil', 'Home::mobil');
$routes->get('/promo', 'Home::promo');
$routes->get('/kontak', 'Home::kontak');

$routes->get('/admin', 'Admin::index');
