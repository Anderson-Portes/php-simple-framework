<?php

require_once "loader.php";
$router = new Router;
$router->get('/', [HomeController::class, 'index']);
$router->post('/auth/register', RegisterController::class);
$router->post('/auth/login', LoginController::class);
$router->post('/auth/logout', LogoutController::class);
$router->load();
