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
$routes->get('/updateDespesa/(:num)', 'Gastos::updateDespesa/$1');
$routes->post('/addDespesas', 'Gastos::addDespesa');

