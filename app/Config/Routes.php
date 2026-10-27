<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Dashboard::index');

$routes->get('login', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('data_penduduk', 'DataPenduduk::index');

$routes->group('', ['filter' => 'auth:Administrator'], function($routes) {
    $routes->post('data_penduduk/edit', 'DataPenduduk::editmodal');
    $routes->post('data_penduduk/update', 'DataPenduduk::update');
    $routes->get('data_penduduk/del/(:num)', 'DataPenduduk::delete/$1');
        
    $routes->get('user', 'User::index');
    $routes->post('user/edit', 'User::editmodal');
    $routes->post('user/save', 'User::save');
});

$routes->get('grafikpeta', 'GrafikPeta::index');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('import', 'Import::index');
    $routes->post('import', 'Import::import');
    $routes->get('import/download', 'Import::download');
});

$routes->group('api', ['filter' => 'basicAuth'], function ($routes) {
    $routes->get('penduduk_all', 'API::index');
    $routes->get('penduduk_by_date', 'API::byDate');
    $routes->get('log_import_data', 'API::logImport');
    $routes->get('desa', 'API::desa');
});