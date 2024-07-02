<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth', 'Auth::auth');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/register/pelanggan', 'Auth::registerPelanggan');

// protected routes
$routes->group('', ['filter' => 'pelanggan'], static function (RouteCollection $routes) {
    $routes->get('/reservasi', 'Reservasi::index');
    $routes->get('/reservasi/(:num)', 'Reservasi::detail/$1');
    $routes->post('/reservasi/buat', 'Reservasi::create');
    $routes->post('/reservasi/pembayaran', 'Reservasi::bayar');
    $routes->get('/reservasi/pembayaran/(:num)', 'Reservasi::pembayaran/$1');
});

// dashboard
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard'], static function (RouteCollection $routes) {
    $routes->get('login', 'Auth::index');
    $routes->get('logout', 'Auth::logout');
    $routes->post('auth', 'Auth::auth');

    // protected dashboard routes
    $routes->group('', ['filter' => 'auth'], static function (RouteCollection $routes) {
        $routes->get('', 'Home::index');
        $routes->get('data-pelanggan', 'Pelanggan::index');
        $routes->get('data-reservasi', 'Reservasi::index');
        $routes->get('data-reservasi/(:num)', 'Reservasi::detail/$1');
        $routes->get('laporan', 'Laporan::index');
        $routes->get('laporan/cetak', 'Laporan::cetak');
        $routes->get('data-promosi', 'Promosi::index');
        $routes->post('data-promosi/tambah', 'Promosi::create');
        $routes->post('data-promosi/edit', 'Promosi::edit');
        $routes->post('data-promosi/hapus', 'Promosi::delete');
    });
});
