<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('en_construccion', 'Home::en_construccion');
$routes->get('recepcion', 'Home::recepcion');

////---------------Espacio admin-------------
$routes->get('gestion_habitaciones', 'Home::gestion_habitaciones');

//---------------Manejo Habitaciones--------------
$routes->get('agregar_habitacion', 'HabitacionController::agregar_habitacion');
$routes->post('agregar_habitacion', 'HabitacionController::agregar_habitacion');
$routes->get('dar_baja_habitacion/(:num)', 'HabitacionController::dar_baja_habitacion/$1');
$routes->get('dar_alta_habitacion/(:num)', 'HabitacionController::dar_alta_habitacion/$1');
