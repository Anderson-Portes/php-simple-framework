<?php

class LoginController
{
  public function __construct()
  {
    GuestMiddleware::run();
  }

  public function index()
  {
    return vue('Auth.Login');
  }

  public function create()
  {
    $data = LoginValidation::make(true);
    auth()->login($data->user);
    return json(['success' => true, 'message' => 'Logged Successfully']);
  }
}
