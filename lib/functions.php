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
