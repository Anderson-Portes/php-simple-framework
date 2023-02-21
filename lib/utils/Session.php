<?php

class Session
{
  public function has(string $key): bool
  {
    return isset($_SESSION[$key]);
  }


  public function flash(string $key)
  {
    $message = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $message;
  }

  public function set(string $key, mixed $value): Session
  {
    $_SESSION[$key] = $value;
    return $this;
  }
}
