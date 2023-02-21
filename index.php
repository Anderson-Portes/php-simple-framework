<?php

require_once "loader.php";
$router = new Router;
$router->get('/', [HomeController::class, 'index']);
$router->resource('/post', PostController::class);
$router->load();
