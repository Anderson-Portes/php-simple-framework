<?php

class Response
{
  public static function json($data, int $statusCode = 200): string
  {
    http_response_code($statusCode);
    header('Content-Type:application/json');
    return json_encode($data);
  }
}
