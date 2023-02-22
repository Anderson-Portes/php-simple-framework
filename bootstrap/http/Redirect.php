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
    if (isset($_SERVER['HTTP_REFERER']))
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    else
      echo "<script>window.history.back()</script>";
  }
}
