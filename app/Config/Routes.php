<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/mobil', 'Home::mobil');
$routes->get('/promo', 'Home::promo');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/article', 'Home::article');

$routes->get('/admin', 'Admin\Admin::index', ['filter' => 'authGuard']);
$routes->group('admin/slider', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\Slider::index');
    $routes->get('create', 'Admin\Slider::create');
    $routes->post('save', 'Admin\Slider::save');
    $routes->get('edit/(:segment)', 'Admin\Slider::edit/$1');
    $routes->post('update/(:segment)', 'Admin\Slider::update/$1');
    $routes->delete('(:num)', 'Admin\Slider::delete/$1');
});

$routes->group('admin/mobil', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\Mobil::index');
    $routes->get('create', 'Admin\Mobil::create');
    $routes->get('show/(:segment)', 'Admin\Mobil::show/$1');
    $routes->post('save', 'Admin\Mobil::save');
    $routes->get('edit/(:segment)', 'Admin\Mobil::edit/$1');
    $routes->post('update/(:segment)', 'Admin\Mobil::update/$1');
    $routes->delete('(:num)', 'Admin\Mobil::delete/$1');
});

$routes->group('admin/type', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\Type::index');
    $routes->get('create/(:segment)', 'Admin\Type::create/$1');
    $routes->post('save', 'Admin\Type::save');
    $routes->get('edit/(:segment)', 'Admin\Type::edit/$1');
    $routes->post('update/(:segment)', 'Admin\Type::update/$1');
    $routes->delete('(:num)', 'Admin\Type::delete/$1');
});

$routes->group('admin/information', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\Information::index');
    $routes->get('create/(:segment)', 'Admin\Information::create/$1');
    $routes->post('save', 'Admin\Information::save');
    $routes->get('edit/(:segment)', 'Admin\Information::edit/$1');
    $routes->post('update/(:segment)', 'Admin\Information::update/$1');
    $routes->delete('(:num)', 'Admin\Information::delete/$1');
});

$routes->group('admin/berita', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\Berita::index');
    $routes->get('create', 'Admin\Berita::create');
    $routes->post('save', 'Admin\Berita::save');
    $routes->get('edit/(:segment)', 'Admin\Berita::edit/$1');
    $routes->post('update/(:segment)', 'Admin\Berita::update/$1');
    $routes->delete('(:num)', 'Admin\Berita::delete/$1');
});

$routes->group('admin/article', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\Article::index');
    $routes->get('create', 'Admin\Article::create');
    $routes->post('save', 'Admin\Article::save');
    $routes->get('edit/(:segment)', 'Admin\Article::edit/$1');
    $routes->post('update/(:segment)', 'Admin\Article::update/$1');
    $routes->delete('(:num)', 'Admin\Article::delete/$1');
});

$routes->group('admin/users', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Admin\User::index');
    $routes->get('create', 'Admin\User::create');
    $routes->post('save', 'Admin\User::save');
    $routes->get('edit/(:segment)', 'Admin\User::edit/$1');
    $routes->post('update/(:segment)', 'Admin\User::update/$1');
    $routes->delete('(:num)', 'Admin\User::delete/$1');
});

$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/logout', 'SigninController::logout');