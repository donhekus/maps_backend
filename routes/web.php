<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/layout', 'MainController@index');
$router->post('/layout', 'MainController@store');
$router->get('/layout/{id}', 'MainController@edit');
$router->get('/layout/{id}', 'MainController@edit');
$router->post('/layout/{id}', 'MainController@update');
$router->post('/layout/{id}/delete', 'MainController@delete');
$router->get('/layout/{name}', 'MainController@getByName');
