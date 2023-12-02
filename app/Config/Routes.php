<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// user login routes
$routes->group("user", function (RouteCollection $routes) {
    $routes->get("/", "UserController::index");
    $routes->add("auth", "UserController::login");
    $routes->add("register", "UserController::register");
    $routes->get("logout", "UserController::logout");
    $routes->add("profile", "UserController::profile");
});

// vehicle routes
$routes->group("vehicle", function (RouteCollection $routes) {
    $routes->add("/", 'VehicleController::index');
    $routes->add("new", 'VehicleController::new');
    $routes->add("create", 'VehicleController::create');
    $routes->add("update/(:any)", 'VehicleController::update/$1');
    $routes->add("delete/(:any)", 'VehicleController::delete/$1');
    $routes->add("(:any)", 'VehicleController::showVehicle/$1');
});
