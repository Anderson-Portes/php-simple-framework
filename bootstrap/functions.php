<?php

function json(mixed $response, int $stausCode = 200)
{
  return Response::json($response, $stausCode);
}

function dumpDie(mixed $value)
{
  return Dump::dumpDie($value);
}

function current_url(): string
{
  return Request::currentUrl();
}

function request(): Request
{
  return new Request;
}

function current_method(): string
{
  return Request::currentMethod();
}

function session(): Session
{
  return new Session;
}

function bcrypt(string $text): string
{
  return Hash::make($text);
}

function auth(): Auth
{
  return new Auth;
}

function runMiddlewares(...$middlewares)
{
  array_map(fn ($m) => $m::run(), $middlewares);
}
