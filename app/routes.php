<?php

//auth
$router->get('/login', 'AuthController@login');
$router->get('/registrate', 'AuthController@registrarse');

//users
$router->post('/user/create', 'UsuarioController@create');
$router->get('/users', 'UsuarioController@show');