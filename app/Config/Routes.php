<?php
// use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profile', 'Home::profile');
$routes->get('/profile/(:any)/(:any)/(:any)', 'Home::profile/$1/$2/$3');
// $routes->get('/profile/(:any)/(:any)/(:any)', [Home::class, 'profile']);