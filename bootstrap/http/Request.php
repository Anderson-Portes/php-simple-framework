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

  public function validate(): array
  {
    $success = true;
    return ['errors' => [], 'success' => $success];
  }

  public function only(string ...$fileds): array
  {
    $values = [];
    foreach ($fileds as $field) {
      $values[$field] = $this->$field ?? null;
    }
    return $values;
  }

  public function header(string $key)
  {
    return getallheaders()[$key] ?? null;
  }

  public function wantsJson(): bool
  {
    return $this->header('Accept') === "application/json";
  }
}
