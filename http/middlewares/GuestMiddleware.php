<?php

class GuestMiddleware implements Middleware
{
  public static function run()
  {
    redirect_if(auth()->check(), site_url());
  }
}
