<?php

use App\Controllers\AddressController;
use App\Controllers\AdminController;
use App\Controllers\IngressosController;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->group('admin', static function ($routes) {
//     $routes->get('', [AdminController::class, 'index'], ['as' => 'admin_index']);
//     $routes->post('resultado', [AdminController::class, 'show'], ['as' => 'admin_show']);
// });

$routes->get('/', [UserController::class, 'redirectTo']);


$routes->group('login', static function($routes) {
    $routes->get('/', [UserController::class, 'login'], ['as' => 'users_login']);
    $routes->post('/', [UserController::class, 'signIn'], ['as' => 'users_signin']);
});


$routes->group('users', static function($routes) {
    $routes->get('', [UserController::class, 'index'], ['as' => 'users_index']);
    $routes->get('create', [UserController::class, 'create'], ['as' => 'users_create']);
    $routes->post('store', [UserController::class, 'store'], ['as' => 'users_store']);
    $routes->get('show/(:any)', [[UserController::class, 'show'], "$1"], ['as' => 'users_show']);
    $routes->put('update/(:any)', [[UserController::class, 'update'], "$1"], ['as' => 'users_update']);
    $routes->delete('delete/(:any)', [[UserController::class, 'delete'], "$1"], ['as' => 'users_delete']);
});

$routes->group('ingressos', static function($routes) {
    $routes->get('', [IngressosController::class, 'index'], ['as' => 'ingressos_index']);
    $routes->get('create', [IngressosController::class, 'create'], ['as' => 'ingressos_create']);
    $routes->post('store', [IngressosController::class, 'store'], ['as' => 'ingressos_store']);
    $routes->get('show/(:any)', [[IngressosController::class, 'show'], "$1"], ['as' => 'ingressos_show']);
    $routes->put('update/(:any)', [[IngressosController::class, 'update'], "$1"], ['as' => 'ingressos_update']);
    $routes->put('refresh/(:any)', [[IngressosController::class, 'refresh'], "$1"], ['as' => 'ingressos_refresh']);
});

