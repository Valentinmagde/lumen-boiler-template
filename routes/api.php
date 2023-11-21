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

$router->get('/', 'Controller@home');
   
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
        | API Routes of Consumer
        |--------------------------------------------------------------------------
        |
        */
        $router->group(['prefix' => 'consumers'], function () use ($router) {
            $router->post('/register', 'ConsumerController@register');
        });

        $router->group(['prefix' => 'consumer'], function () use ($router) {
            $router->get('/me', 'ConsumerController@me');
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
            $router->get('/{userId}', 'UserController@indexByID');
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
            $router->get('/', 'CountryController@indexAll');
        });

        $router->group(['prefix' => 'country'], function () use ($router) {
            $router->get('/{iso_code_2}/countryID', 'CountryController@getIdByIso');
            $router->get('/{iso_code_2}/countryByIso', 'CountryController@indexByIso');
            $router->get('/{id}/id', 'CountryController@indexByID');
            $router->get('/{ip}/isoFromNumericIp', 'CountryController@isoByNumericIp');
            $router->get('/convertIP', 'CountryController@convertIPV4');
        });
    }
);
