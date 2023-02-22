<?php

require_once "loader.php";
$router = new Router;
$router->get('/', [HomeController::class, 'index']);
$router->resource('/auth/register', RegisterController::class, [
  'only' => ['index', 'create']
]);
$router->resource('/auth/login', LoginController::class, [
  'only' => ['index', 'create']
]);
$router->get('/teste', function () {
  $func = "empty";
  $value = null;
  return $func($value);
});
$router->post('/auth/logout', LogoutController::class);
$router->load();
