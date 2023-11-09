<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard', ['filter'=>'auth']); 
$routes->get('/gastos', 'GastosController::calcularGastos');
$routes->get('/addDespesa', 'GastosController::addDespesaView');
$routes->get('/deletarDespesa/(:num)', 'GastosController::deletarDespesa/$1');
$routes->match(['get', 'post'], '/updateDespesa/(:num)', 'GastosController::updateDespesa/$1');
// $routes->match(['get', 'post'], '/login', 'Usuario::index');
$routes->post('/addDespesas', 'GastosController::addDespesa');
$routes->get('relatorio', 'GastosController::viewRelatorio');

// Rotas de usuario
$routes->get('login', 'UsuarioController::index');
$routes->post('authenticate', 'UsuarioController::authenticate');
$routes->get('logout', 'UsuarioController::logout');
$routes->get('create', 'UsuarioController::create');
$routes->get('register', 'UsuarioController::register');
$routes->post('createUser', 'UsuarioController::createUser');
$routes->get('usuario', 'UsuarioController::viewUser');
$routes->post('alterarDados', 'UsuarioController::alterarDados');
