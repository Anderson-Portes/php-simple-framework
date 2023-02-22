<?php

class GuestMiddleware implements Middleware
{
  public static function run()
  {
    if (auth()->check())
      die(json(['success' => false, 'message' => 'You are already authenticated'], 403));
  }
}
