<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('en_construccion', 'Home::en_construccion');
$routes->get('recepcion', 'Home::recepcion');
$routes->get('detalle_habitacion/(:num)', 'ReservaController::detalle_habitacion/$1');
$routes->get('login', 'UserController::login');
$routes->post('login', 'UserController::login');
$routes->get('logout', 'UserController::logout');

////---------------Espacio admin-------------


//---------------Manejo Habitaciones--------------
$routes->get('gestion_habitaciones', 'HabitacionController::index');
$routes->get('agregar_habitacion', 'HabitacionController::agregar_habitacion');
$routes->post('agregar_habitacion', 'HabitacionController::agregar_habitacion');
$routes->get('dar_baja_habitacion/(:num)', 'HabitacionController::dar_baja_habitacion/$1');
$routes->get('dar_alta_habitacion/(:num)', 'HabitacionController::dar_alta_habitacion/$1');
$routes->get('modificar_habitacion/(:num)', 'HabitacionController::modificar_habitacion/$1');
$routes->post('modificar_habitacion/(:num)', 'HabitacionController::modificar_habitacion/$1');


//----------------------API REST------------------

$routes->group('api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    //------------Habitaciones---------------
    $routes->get('habitaciones', 'Habitaciones::index');
    $routes->get('habitaciones/get', 'Habitaciones::getDetalleHabitaciones');
    $routes->post('habitaciones/create', 'Habitaciones::create');
    $routes->get('habitaciones/edit/(:num)', 'Habitaciones::edit/$1');
    $routes->put('habitaciones/update/(:num)', 'Habitaciones::update/$1');
    $routes->put('habitaciones/delete/(:num)', 'Habitaciones::delete/$1');
    $routes->put('habitaciones/activate/(:num)', 'Habitaciones::activate/$1');

    //-------------Pisos----------------------
    $routes->get('pisos', 'Pisos::index');

    //-------------Tipos de Habitación----------------------
    $routes->get('tiposHab', 'TiposHab::index');

    //-------------Tipos de Cama----------------------
    $routes->get('tiposCama', 'TiposCama::index');

    //-------------Usuarios----------------------
    $routes->get('usuarios', 'Usuarios::index');
    $routes->post('usuarios/create', 'Usuarios::create');
    $routes->get('usuarios/edit/(:num)', 'Usuarios::edit/$1');
    $routes->get('usuarios/get_by_username/(:segment)', 'Usuarios::getByUsername/$1');
    $routes->put('usuarios/update/(:num)', 'Usuarios::update/$1');
    $routes->put('usuarios/delete/(:num)', 'Usuarios::delete/$1');
    $routes->put('usuarios/activate/(:num)', 'Usuarios::activate/$1');

    //-------------Tipos de Perfil----------------------
    $routes->get('tiposPerfil', 'TiposPerfil::index');
});

$routes->group('auth', ['namespace' => 'App\Controllers\API'], function ($routes) {

    //-------------Autentificacion----------------------
    $routes->post('login', 'Auth::login');
});
