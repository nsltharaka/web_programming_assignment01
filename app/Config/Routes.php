<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// user login routes
$routes->group("user", function (RouteCollection $routes) {
    $routes->add("/", "UserController::index");
    $routes->add("register", "UserController::register");
    $routes->get("logout", "UserController::logout");
    $routes->add("profile", "UserController::profile");
});

// vehicle routes
$routes->group("vehicle", function (RouteCollection $routes) {
    $routes->add("/", 'VehicleController::index');
});
