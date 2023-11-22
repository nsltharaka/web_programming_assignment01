<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// login routes
$routes->group("user", function ($routes) {

    $routes->get("/", "LoginController::index");
    $routes->get("auth/(:any)/(:any)", "LoginController::auth/$1/$2");

});
