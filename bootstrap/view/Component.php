<?php

class Component
{
  public static function render(string $path, array $data = []): void
  {
    $path = str_replace('.', '/', $path);
    extract($data);
    include APP_ROOT . "\\views\\components\\" . $path . ".php";
  }

  public static function vue(string $path): string
  {
    $path = str_replace('.', '/', $path);
    return '<script src="' . site_url('/public/vue/' . $path . '.js') . '"></script>';
  }

  public static function asset(string $path = ""): string
  {
    return site_url('/public/' . $path);
  }

  public static function inputMethod(string $method): string
  {
    return '<input hidden name="_method" value="' . $method . '"/>';
  }
}
