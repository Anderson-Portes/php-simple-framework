<?php

class Redirect
{

  public static function if(bool $clause, string $url): void
  {
    if ($clause) self::to($url);
  }

  public static function to(string $url): void
  {
    die(header("Location:" . $url));
  }

  public static function back(): void
  {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}
