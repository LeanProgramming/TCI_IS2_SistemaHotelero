<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('en_construccion', 'Home::en_construccion');
$routes->get('recepcion', 'Home::recepcion');
$routes->get('login', 'UserController::login');
$routes->post('login', 'UserController::login');
$routes->get('logout', 'UserController::logout');

$routes->get('detalle_habitacion/(:num)', 'RegistroController::detalleHabitacion/$1');
$routes->post('guardar_registro', 'RegistroController::guardarRegistro');
$routes->post('cobrar_reserva/(:num)', 'RegistroController::cobrarReserva/$1');
$routes->get('liberar_habitacion/(:num)/(:num)', 'RegistroController::liberarHabitacion/$1/$2');

$routes->get('buscar_cliente/(:segment)/(:segment)', 'ClienteController::buscarCliente/$1/$2');

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

    //-------------Clientes----------------------
    $routes->get('clientes', 'Clientes::index');
    $routes->post('clientes/create', 'Clientes::create');
    $routes->get('clientes/edit/(:num)', 'Clientes::edit/$1');
    $routes->get('clientes/get_by_dni/(:segment)', 'Clientes::getByDNI/$1');
    $routes->put('clientes/update/(:num)', 'Clientes::update/$1');
    $routes->put('clientes/delete/(:num)', 'Clientes::delete/$1');
    $routes->put('clientes/activate/(:num)', 'Clientes::activate/$1');

    //-------------Registros----------------------
    $routes->get('registros', 'Registros::index');
    $routes->get('registros/get_by_room/(:num)', 'Registros::getByRoom/$1');
    $routes->post('registros/create', 'Registros::create');
    $routes->get('registros/edit/(:num)', 'Registros::edit/$1');

    //-------------Medios de Pago----------------------
    $routes->get('medios_pago', 'MediosDePago::index');
    $routes->post('medios_pago/create', 'MediosDePago::create');

    //-------------Pagos----------------------
    $routes->get('pagos', 'Pagos::index');
    $routes->post('pagos/create', 'Pagos::create');
    $routes->get('pagos/get_by_register/(:num)', 'Pagos::getByRegister/$1');
});

$routes->group('auth', ['namespace' => 'App\Controllers\API'], function ($routes) {

    //-------------Autentificacion----------------------
    $routes->post('login', 'Auth::login');
});
