<?php

class LoginController
{
  public function __construct()
  {
    GuestMiddleware::run();
  }

  public function __invoke()
  {
    $data = LoginValidation::make(true);
    return json(['success' => true, 'message' => 'Logged successfully', 'data' => $data->user]);
  }
}
