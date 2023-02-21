<?php

class Request
{

  public function __construct()
  {
    $json = file_get_contents('php://input');
    $data = json_decode($json) ?? [] + $_REQUEST;
    foreach ($data ?? [] as $key => $value) {
      $this->$key = $value;
    }
  }

  public static function currentUrl(): string
  {
    $url = $_GET['url'] ?? '';
    if (str_ends_with($url, '/')) $url = substr($url, 0, -1);
    return $url;
  }

  public static function currentMethod(): string
  {
    return $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];
  }

  public function toArray(): array
  {
    return (array) $this;
  }
}
