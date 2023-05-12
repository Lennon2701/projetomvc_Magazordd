<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/main', 'MainController@index');

/**
 * Router User
 */
$router->get('/login', 'UserController@signin');
$router->post('/login', 'UserController@signinAction');

$router->get('/cadastro', 'UserController@signup');


/**
 * Router Reservations
 */
$router->get('/reservations', 'ReservationController@index');
$router->get('/reservations/{id}', 'ReservationController@index');

$router->get('/reservations/my/insert', 'ReservationController@add');
$router->post('/reservations/my/insert', 'ReservationController@insert');

$router->get('/reservations/my/{id}/edit', 'ReservationController@edit');
$router->post('/reservations/my/{id}/edit', 'ReservationController@insert');

$router->get('/reservations/my/{id}/delete', 'ReservationController@delete');


/**
 * Router Tables
 */
$router->get('/tables', 'TableController@index');