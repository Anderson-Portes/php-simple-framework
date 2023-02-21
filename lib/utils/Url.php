<?php

class Url
{
  public static function to(string $url = ''): string
  {
    if (str_starts_with($url, '/')) $url = substr($url, 1);
    return SITE_URL . $url;
  }
}
