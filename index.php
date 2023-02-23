<?php

require_once "loader.php";
$router = new Router;
$router->get('/', [HomeController::class, 'index']);
$router->prefix('/auth/')->group(function ($router) {
  $router->resource('/register/', RegisterController::class, [
    'only' => ['index', 'create']
  ]);
  $router->resource('/login/', LoginController::class, [
    'only' => ['index', 'create']
  ]);
  $router->post('/logout/', LogoutController::class);
});
$router->load();
