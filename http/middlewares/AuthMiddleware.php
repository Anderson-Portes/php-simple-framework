<?php

class AuthMiddleware implements Middleware
{
  public static function run()
  {
    redirect_if(auth()->guest(), site_url('/auth/login'));
  }
}
