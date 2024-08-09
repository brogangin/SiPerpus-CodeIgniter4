<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Login
$routes->get('/login', 'LoginController::index');
$routes->post('/logging', 'LoginController::logging');
$routes->get('/logout', 'LoginController::logout');

$routes->group('', ['filter' => 'login'], static function ($routes) {


    $routes->get('/', 'Dashboard::index');
    $routes->get('/dashboard', 'Dashboard::index');

    // BUKU
    $routes->get('/buku', 'BukuController::index');
    $routes->get('/buku/tambah', 'BukuController::create');
    $routes->post('/buku/simpan', 'BukuController::save');
    $routes->get('/buku/detail/(:segment)', 'BukuController::detail/$1');
    $routes->post('/buku/ubah/(:segment)', 'BukuController::update/$1');
    $routes->delete('/buku/hapus/(:num)', 'BukuController::delete/$1');

    // Anggota
    $routes->get('/anggota', 'AnggotaController::index');
    $routes->get('/anggota/tambah', 'AnggotaController::create');
    $routes->post('/anggota/simpan', 'AnggotaController::save');
    $routes->get('/anggota/detail/(:segment)', 'AnggotaController::detail/$1');
    $routes->post('/anggota/ubah/(:segment)', 'AnggotaController::update/$1');
    $routes->delete('/anggota/hapus/(:num)', 'AnggotaController::delete/$1');

    // Admin
    $routes->group('', ['filter' => 'role'], static function ($routes) {
        $routes->get('/admin', 'AdminController::index');
        $routes->get('/admin/tambah', 'AdminController::create');
        $routes->post('/admin/simpan', 'AdminController::save');
        $routes->get('/admin/detail/(:segment)', 'AdminController::detail/$1');
        $routes->post('/admin/ubah/(:num)', 'AdminController::update/$1');
        $routes->delete('/admin/hapus/(:num)', 'AdminController::delete/$1');
    });

    // Peminjaman
    $routes->get('/peminjaman', 'PeminjamanController::index');
    $routes->get('/peminjaman/tambah', 'PeminjamanController::create');
    $routes->post('/peminjaman/simpan', 'PeminjamanController::save');
    $routes->get('/peminjaman/detail/(:segment)', 'PeminjamanController::detail/$1');
    $routes->post('/peminjaman/ubah/(:num)', 'PeminjamanController::update/$1');

    // Pengembalian
    $routes->get('/pengembalian', 'PengembalianController::index');
    $routes->get('/pengembalian/detail/(:segment)', 'PengembalianController::detail/$1');

    // Profil
    $routes->get('/profile', 'ProfileController::index');
    $routes->post('/profile/ubah', 'ProfileController::update');
});
