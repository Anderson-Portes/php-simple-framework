<?php

class DB
{
  public static function connect(): PDO
  {
    try {
      $type = 'mysql';
      $host = 'localhost';
      $database = 'minimal_framework';
      $user = 'root';
      $password = 'root';
      return new PDO($type . ":host=" . $host . ";dbname=" . $database, $user, $password);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }
}
