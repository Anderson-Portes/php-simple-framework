<?php

class Dump
{
  public static function dumpDie(mixed $value)
  {
    die(var_dump($value));
  }
}
