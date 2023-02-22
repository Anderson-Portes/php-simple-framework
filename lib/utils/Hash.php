<?php

class Hash
{
  public static function make(string $text): string
  {
    return password_hash($text, PASSWORD_BCRYPT);
  }

  public static function check(string $text, string $hash): bool
  {
    return password_verify($text, $hash);
  }
}
