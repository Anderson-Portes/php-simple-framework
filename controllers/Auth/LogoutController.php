<?php

class LogoutController
{
  public function __invoke()
  {
    runMiddlewares(AuthMiddleware::class);
    auth()->logout();
    return redirect(site_url('/auth/login'));
  }
}
