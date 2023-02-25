<?php

class HomeController
{
  public function index()
  {
    runMiddlewares(AuthMiddleware::class);
    return react('Index');
  }
}
