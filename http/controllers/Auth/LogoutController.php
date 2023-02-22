<?php

class LogoutController
{
  public function __invoke()
  {
    AuthMiddleware::run();
    auth()->logout();
    return json(['success' => true, 'message' => 'logout successfully']);
  }
}
