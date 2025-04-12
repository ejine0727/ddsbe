<?php


/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users', 'UserController@index'); // List users
    $router->post('/users', 'UserController@store'); // Add user
    $router->get('/users/{id}', 'UserController@show'); // Get user by ID
    $router->put('/users/{id}', 'UserController@update'); // Update user
    $router->patch('/users/{id}', 'UserController@update'); // Partial update
    $router->delete('/users/{id}', 'UserController@destroy'); // Delete user


    // userjob routes
    $router->get('/usersjob','UserJobController@index');
    $router->get('/userjob/{id}','UserJobController@show'); // get user by id
    $router->post('/usersjob', 'UserJobController@store');
    
});
