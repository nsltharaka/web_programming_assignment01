<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// login routes
$routes->group("user", function ($routes) {
    $routes->add("/", "LoginController::index");
    $routes->add("auth", "LoginController::auth");
    $routes->add("register", "LoginController::register");
});
