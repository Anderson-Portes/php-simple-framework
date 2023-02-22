<?php

class Session
{
  public function has(string $key): bool
  {
    return isset($_SESSION[$key]);
  }

  public function get(string $key): mixed
  {
    return $_SESSION[$key] ?? null;
  }

  public function flash(string $key)
  {
    $message = $this->get($key);
    $this->remove($key);
    return $message;
  }

  public function remove(string $key): void
  {
    unset($_SESSION[$key]);
  }

  public function set(string $key, mixed $value): Session
  {
    $_SESSION[$key] = $value;
    return $this;
  }
}
