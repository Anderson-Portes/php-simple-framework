<?php

function json(mixed $response, int $stausCode = 200, bool $setContentType = false)
{
  return Response::json($response, $stausCode, $setContentType);
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

function component(string $path, array $data = []): void
{
  Component::render($path, $data);
}

function page(string $path, array $data = []): void
{
  Page::render($path, $data);
}

function current_method(): string
{
  return Request::currentMethod();
}

function site_url(string $url = ''): string
{
  return Url::to($url);
}

function form_method(string $method): string
{
  return Component::inputMethod($method);
}

function redirect(string $url): void
{
  Redirect::to($url);
}

function redirect_if(bool $clause, string $url)
{
  Redirect::if($clause, $url);
}

function redirect_back(): void
{
  Redirect::back();
}

function asset(string $path)
{
  return Component::asset($path);
}

function session(): Session
{
  return new Session;
}

function vue(string $path, array $data = []): void
{
  Page::vue($path, $data);
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

function not_found(string $message = "Page not found.")
{
  return Response::notFound($message);
}
