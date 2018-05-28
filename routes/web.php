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
    return view('testchild');
});

$router->get('/games', 'GamesController@index');
$router->get('/games/{gameId}', 'GamesController@get');

$router->get('/api/users/{userId}', 'UsersController@get');
$router->get('/api/reviews/{gameId}', 'ReviewsController@get');

$router->post('/api/reviews', 'ReviewsController@add');
$router->post('/api/users', 'UsersController@add');
$router->post('/api/login', 'UsersController@login');
$router->post('/api/games', 'GamesController@add');


$router->put('/api/reviews/{reviewId}', 'ReviewsController@update');
$router->put('/api/games/{gameId}', 'GamesController@update');


$router->delete('/api/games/{gameId}', 'GamesController@delete');
$router->delete('/api/reviews/{reviewId}', 'ReviewsController@delete');
$router->delete('/api/users/{userId}', 'UsersController@delete');

Auth::routes();

$router->get('/home', 'HomeController@index')->name('home');
