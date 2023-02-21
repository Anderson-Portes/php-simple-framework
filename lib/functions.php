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

function component(string $path): void
{
  Component::render($path);
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

function session(): Session
{
  return new Session;
}
