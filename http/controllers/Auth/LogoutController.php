<?php

class LogoutController
{
  public function __invoke()
  {
    AuthMiddleware::run();
    auth()->logout();
    return redirect(site_url('/auth/login'));
  }
}
