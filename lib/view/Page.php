<?php

class Page
{

  public static function constraints(): array
  {
    return [];
  }

  public static function render(string $path, array $data = []): void
  {
    $path = str_replace('.', '/', $path);
    extract($data + self::constraints());
    include __DIR__ . "\\..\\..\\views\\" . $path . ".php";
  }
}
