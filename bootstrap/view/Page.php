<?php

class Page
{

  public static function constraints(): array
  {
    return ['site_url' => site_url(), 'errors' => session()->flash('errors')];
  }

  public static function render(string $path, array $data = []): void
  {
    $path = str_replace('.', '/', $path);
    extract($data + self::constraints());
    require_once APP_ROOT . "\\views\\" . $path . ".php";
  }

  public static function vue(string $path, array $data = []): void
  {
    $data = $data + self::constraints();
    $path = str_replace('.', '\\', $path);
    require_once APP_ROOT . "\\views\\vue.php";
  }
}
