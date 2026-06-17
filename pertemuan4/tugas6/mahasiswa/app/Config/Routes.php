<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Mahasiswa::index');

// ROUTE MAHASISWA
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa/getData', 'Mahasiswa::getData');
$routes->get('/mahasiswa/form', 'Mahasiswa::form');
$routes->post('/mahasiswa/save', 'Mahasiswa::save');
$routes->get('/mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('/mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('/mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
