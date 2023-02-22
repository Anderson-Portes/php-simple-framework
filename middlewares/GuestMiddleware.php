<?php

class GuestMiddleware
{
  public static function run()
  {
    redirect_if(auth()->check(), site_url());
  }
}
