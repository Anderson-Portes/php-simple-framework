<?php

class Response
{
  public static function json($data, int $statusCode = 200): string
  {
    http_response_code($statusCode);
    return json_encode($data);
  }

  public static function notFound()
  {
    if (request()->wantsJson())
      die(json(['message' => 'Page not found.'], 404));
    return page('errors.404');
  }
}
