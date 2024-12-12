<?php
//index.php
require_once '../helpers.php';

$config = require basePath('config/db.php');

require_once basePath('app/database/database.php');
$database = new Database($config);
require_once basePath('app/router.php');
$router = new Router($database);
require_once basePath('app/routes.php');
//MODELS
require_once basePath('app/models/Users.php');

//Controllers
require_once basePath('app/controllers/UsuarioController.php');
require_once basePath('app/controllers/AuthController.php');
$router->resolve();
