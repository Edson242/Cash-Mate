<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/gastos', 'Gastos::calcularGastos');
$routes->get('/addDespesa', 'Gastos::addDespesaView');
$routes->get('/deletarDespesa/(:num)', 'Gastos::deletarDespesa/$1');
$routes->match(['get', 'post'], '/updateDespesa/(:num)', 'Gastos::updateDespesa/$1');
// $routes->match(['get', 'post'], '/login', 'Usuario::index');
$routes->post('/addDespesas', 'Gastos::addDespesa');

// Rotas de usuario
$routes->post('login', 'Usuario::index');
$routes->post('authenticate', 'Usuario::authenticate');
$routes->get('logout', 'Usuario::logout');
$routes->get('create', 'Usuario::create');
$routes->get('register', 'Usuario::register');
$routes->post('createUser', 'Usuario::createUser');
