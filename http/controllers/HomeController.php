<?php

class HomeController
{
  public function index()
  {
    AuthMiddleware::run();
    return json(['message' => 'Hello World']);
  }
}
