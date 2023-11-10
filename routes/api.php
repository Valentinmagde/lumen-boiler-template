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

$router->group(
    [
        'prefix' => 'api/v2'
    ],
    function () use ($router) {

        /*
        |--------------------------------------------------------------------------
        | API Routes of Authentification
        |--------------------------------------------------------------------------
        |
        */
        $router->group(['prefix' => 'auth'], function () use ($router) {
            $router->post('/login', 'AuthController@login');
            $router->post('/register', 'AuthController@register');
            $router->post('/logout', 'AuthController@logout');
            $router->get('/me', 'AuthController@me');
            $router->put('/update', 'AuthController@update');
            $router->post('/refresh', 'AuthController@refresh');
        });

        /*
        |--------------------------------------------------------------------------
        | API Routes of Hotels
        |--------------------------------------------------------------------------
        |
        */
        $router->get('/hotels', 'HotelController@index');
    }
);
