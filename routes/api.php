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
        $router->group(['prefix' => 'token'], function () use ($router) {
            $router->post('/access', 'AuthController@login');
            $router->post('/revoke', 'AuthController@logout');
            $router->post('/refresh', 'AuthController@refresh');
        });

        /*
        |--------------------------------------------------------------------------
        | API Routes of User
        |--------------------------------------------------------------------------
        |
        */
        $router->group(['prefix' => 'users'], function () use ($router) {
            $router->post('/register', 'UserController@register');
        });

        $router->group(['prefix' => 'user'], function () use ($router) {
            $router->get('/me', 'UserController@me');
        });

        /*
        |--------------------------------------------------------------------------
        | API Routes of Hotels
        |--------------------------------------------------------------------------
        |
        */
        $router->get('/hotels', 'HotelController@index');

        /*
        |--------------------------------------------------------------------------
        | API Routes of Country
        |--------------------------------------------------------------------------
        |
        */
        $router->group(['prefix' => 'countries'], function () use ($router) {
            $router->get('/', 'CountryController@index');
        });
    }
);