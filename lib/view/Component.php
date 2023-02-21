<?php

class Component
{
  public static function render(string $path): void
  {
    $path = str_replace('.', '/', $path);
    include __DIR__ . "\\..\\..\\views\\components\\" . $path . ".php";
  }


  public static function inputMethod(string $method): string
  {
    return '<input hidden name="_method" value="' . $method . '"/>';
  }
}
