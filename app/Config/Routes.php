<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

////---------------Espacio admin-------------
$routes->get('gestion_habitaciones', 'Home::gestion_habitaciones');
