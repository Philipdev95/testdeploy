<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Auth;

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
    return view('start');
});

$router->get('/games', 'GamesController@index');
$router->get('/games/{gameId}', 'GamesController@get');

$router->get('/myprofile', 'GamesController@getOwned');


$router->get('/api/users/{userId}', 'UsersController@get');
$router->get('/api/users', 'UsersController@index');
$router->get('/api/reviews/{gameId}', 'ReviewsController@get');

$router->post('/api/reviews/{gameId}', 'ReviewsController@add');
$router->post('/api/users', 'UsersController@add');
$router->post('/api/login', 'UsersController@login');
$router->post('/api/games', 'GamesController@add');


$router->put('/api/reviews/{reviewId}/{gameId}', 'ReviewsController@update');
$router->put('/api/games/{gameId}', 'GamesController@update');
$router->put("/api/users/{userId}", "UsersController@update");


$router->delete('/api/games/{gameId}', 'GamesController@delete');
$router->delete('/api/reviews/{reviewId}/{gameId}', 'ReviewsController@delete');
$router->delete('/api/users/{userId}', 'UsersController@delete');

Auth::routes();
