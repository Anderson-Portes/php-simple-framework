<?php

class Url
{
  public static function to(string $url = ''): string
  {
    return SITE_URL . $url;
  }
}
