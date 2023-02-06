<?php

class Response
{
  public static function json($data, int $statusCode = 200): string
  {
    http_response_code($statusCode);
    return json_encode($data);
  }
}
