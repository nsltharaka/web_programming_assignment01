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
    $routes->get("profile/:(any)", "UserController::profile/$1");
});

// vehicle routes
$routes->group("vehicle", function (RouteCollection $routes) {
    $routes->add("/", 'VehicleController::index');
});
