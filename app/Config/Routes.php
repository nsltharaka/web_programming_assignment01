<?php

use CodeIgniter\Router\RouteCollection;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    $routes->add("rentals", "UserController::rentals");
});

// vehicle routes
$routes->group("vehicle", function (RouteCollection $routes) {
    $routes->add("/", 'VehicleController::index');
    $routes->add("show/(:any)", 'VehicleController::view/$1');
    $routes->add("new", 'VehicleController::new');
    $routes->add("create", 'VehicleController::create');
    $routes->add("update/(:any)", 'VehicleController::update/$1');
    $routes->add("delete/(:any)", 'VehicleController::delete/$1');
    $routes->add("(:any)", 'VehicleController::showVehicle/$1');
});

// rentals
$routes->group('rental', function (RouteCollection $routes) {
    $routes->add('new/(:any)', 'RentalController::index/$1');
    $routes->add('create', 'RentalController::create');
});
