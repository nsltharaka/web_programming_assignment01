<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// user login routes
$routes->group("user", function ($routes) {
    $routes->add("/", "LoginController::index");
    $routes->add("register", "LoginController::register");
});
