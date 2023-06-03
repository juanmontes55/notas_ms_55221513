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

//ESTUDIANTES
$router -> get('verEstudiantes', 'EstudianteController@index');
$router -> get('mostrarEstudiantes/{codigo}', 'EstudiantesController@show');
$router -> post('crearEstudiantes', 'EstudianteController@store');
$router -> put('modificarEstudiantes/{codigo}', 'EstudianteController@update');
$router -> delete('eliminarEstudiantes/{codigo}', 'EstudianteController@destroy');

//ACTIVIDADES
$router -> get('actividades', 'ActividadController@index');
$router -> get('mostarActividades/{id}', 'ActividadController@show');
$router -> post('crearActividades', 'ActividadController@store');
$router -> put('modificarActividades/{id}', 'ActividadController@update');
$router -> delete('eliminarActividades/{id}', 'ActividadController@destroy');