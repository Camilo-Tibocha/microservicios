<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/tarea', 'TareaController@store');
    $router->get('/tarea4', 'ListarTareaController@index');
    $router->put('/tarea/{id}', 'ActualizarTareaController@update');
    $router->delete('/tarea/{id}', 'EliminarTareaController@destroy');
    $router->get('/tarea3', 'EstadosTareaController@index');
    $router->put('/tarea1/{id}', 'ReasignarTareaController@update');
    $router->put('/tarea/{id}', 'CambiarEstadoController@update');
    $router->get('/tarea2', 'FiltrarTareaController@index');
});
