<?php

class Auth
{

  public static function user()
  {
    return session()->get('auth.user');
  }

  public static function login(array $user): void
  {
    session()->set('auth.user', $user);
  }

  public static function check()
  {
    return session()->has('auth.user');
  }

  public static function guest()
  {
    return !self::check();
  }

  public static function id(): mixed
  {
    if ($user = self::user()) return $user['id'];
    return null;
  }

  public static function logout()
  {
    session()->remove('auth.user');
  }
}
