<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// user login routes
$routes->group("user", function (RouteCollection $routes) {
    $routes->add("/", "LoginController::index");
    $routes->add("register", "LoginController::register");
});

// vehicle routes
$routes->group("vehicle", function (RouteCollection $routes) {
    $routes->get("new", 'VehicleController::index');
});
