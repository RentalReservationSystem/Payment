<?php
/** @var \Laravel\Lumen\Routing\Router $router */
/*
|---------------------------------------------------------------------
-----
| Application Routes
|---------------------------------------------------------------------
-----
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
return $router->app->version();
});
// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
$router->get('/users',['uses' => 'UserController@getUsers']);
});
// more simple routes
$router->get('/payments',['uses' => 'UserController@getUsers']);
$router->get('/getpayments', 'UserController@index'); // get all users
$router->post('/addpayments', 'UserController@add'); // create new user
$router->get('/getpayments/{id}', 'UserController@show'); // get user by id
$router->put('/updatepayments/{id}', 'UserController@update'); // update user
$router->patch('/updatepayments/{id}', 'UserController@update'); // update user
$router->delete('/deletepayments/{id}', 'UserController@delete'); // delete