<?php

require_once __DIR__ . "\\loader.php";
$router = new Router;
$router->get('/', [HomeController::class, 'index']);
$router->get('/teste', function () {
  return vue('Teste');
});
$router->resource('/post', PostController::class);
$router->load();
