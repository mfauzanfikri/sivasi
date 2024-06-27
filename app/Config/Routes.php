<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// dashboard
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard'], static function (RouteCollection $routes) {
    $routes->get('login', 'Auth::index');
    $routes->get('logout', 'Auth::logout');
    $routes->post('auth', 'Auth::auth');

    // restricted dashboard routes
    $routes->group('', ['filter' => 'auth'], static function (RouteCollection $routes) {
        $routes->get('', 'Home::index');
        $routes->get('data-pelanggan', 'Pelanggan::index');
        $routes->get('data-reservasi', 'Reservasi::index');
        $routes->get('data-reservasi/(:num)', 'Reservasi::detail/$1');
        $routes->get('laporan', 'Laporan::index');
        $routes->get('laporan/cetak', 'Laporan::cetak');
    });
});
