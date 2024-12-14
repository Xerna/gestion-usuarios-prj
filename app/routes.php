<?php

//auth
$router->get('/login', 'AuthController@login');
$router->get('/registrate', 'AuthController@registrarse');

//users
$router->post('/user/create', 'UsuarioController@create');
$router->get('/users/list', 'UsuarioController@list');
$router->delete('users/delete', 'UsuarioController@delete');
