<?php

abstract class Controller
{
  private Request $request;

  public function __construct()
  {
    $this->request = request();
  }
}
