<?php

class AuthMiddleware implements Middleware
{
  public static function run()
  {
    if (auth()->guest())
      die(json(['success' => false, 'message' => 'You must to be authenticated'], 401));
  }
}
