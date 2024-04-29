<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

////---------------Espacio admin-------------
$routes->get('gestion_habitaciones', 'Home::gestion_habitaciones');

//---------------Manejo Habitaciones--------------
$routes->get('agregar_habitacion', 'HabitacionController::agregar_habitacion');
$routes->post('agregar_habitacion', 'HabitacionController::agregar_habitacion');
$routes->get('eliminar_habitacion/(:num)', 'HabitacionController::eliminar_habitacion/$1');
