<?php

class HomeController
{
  public function index()
  {
    runMiddlewares(AuthMiddleware::class);
    return vue('Index');
  }
}
