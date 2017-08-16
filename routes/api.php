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

$app->group(['prefix' => 'api'], function () use ($app) {
    $app->get('/', function () use ($app) {
        return [
            "app" => config('app.name'),
            "version" => config('app.version'),
        ];
    });

    $app->post('/auth', 'AuthController@login');
    $app->put('/auth', 'AuthController@refresh');
    $app->patch('/auth', 'AuthController@refresh');
});

$app->group(['prefix' => 'api', 'middleware' => 'jwt.auth'], function () use ($app) {
    $app->get('/protected', function () use ($app) {
        return [
            "app" => config('app.name'),
            "version" => config('app.version'),
        ];
    });

    $app->delete('/auth', 'AuthController@logout');
    $app->get('/user', 'AuthController@currentUser');
});
