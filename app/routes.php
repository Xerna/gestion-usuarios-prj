<?php

//auth
$router->get('/auth/login', 'AuthController@login');
$router->get('/auth/register', 'UsuarioController@create');

//users
$router->post('/users/store', 'UsuarioController@store');
$router->get('/users/list', 'UsuarioController@list');
$router->get('/users/{id}', 'UsuarioController@show');
$router->delete('/users/{id}', 'UsuarioController@destroy');
$router->put('/users/{id}', 'UsuarioController@update');


$router->delete('users/delete', 'UsuarioController@delete');
