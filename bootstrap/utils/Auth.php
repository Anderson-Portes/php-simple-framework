<?php

class Auth
{

  public static function user()
  {
    if (session()->has('auth.user')) {
      $sessionUserId = session()->get('auth.user')['id'] ?? null;
      return (new User)->firstWhere("id = '" . $sessionUserId . "'");
    }
    return self::userApi();
  }

  public static function userApi()
  {
    $authorizationHeader = getallheaders()['Authorization'] ?? null;
    if (!$authorizationHeader) return;
    $token = str_replace('Bearer ', '', $authorizationHeader);
    return (new User)->firstWhere("access_token = '" . $token . "'");
  }

  public static function login(array $user): void
  {
    session()->set('auth.user', $user);
  }

  public static function check()
  {
    return self::user() ? true : false;
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
