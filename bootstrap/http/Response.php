<?php

class Response
{
  public static function json($data, int $statusCode = 200, bool $setContentType = false): string
  {
    http_response_code($statusCode);
    if ($setContentType)
      header('Content-Type:application/json');
    return json_encode($data);
  }

  public static function notFound(string $message)
  {
    if (request()->wantsJson())
      die(json(['message' => $message], 404));
    return page('errors.404', compact('message'));
  }
}
