<?php

require_once "loader.php";
$router = new Router;
$router->get('/', [HomeController::class, 'index']);
$router->prefix('auth')->group(function ($router) {
  $router->post('/register', RegisterController::class);
  $router->post('/login', LoginController::class);
  $router->post('/logout', LogoutController::class);
});
$router->load();
