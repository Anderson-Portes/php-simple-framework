<?php

class Redirect
{
  public static function to(string $url): void
  {
    header("Location:" . site_url($url));
  }
}
