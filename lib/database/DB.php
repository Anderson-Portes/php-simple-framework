<?php

class DB
{
  public static function connect(): PDO
  {
    try {
      $type = DB_TYPE;
      $host = DB_HOST;
      $database = DB_NAME;
      $user = DB_USER;
      $password = DB_PASSWORD;
      $port = DB_PORT;
      return new PDO($type . ":host=" . $host . ":" . $port . ";dbname=" . $database, $user, $password);
    } catch (Exception $ex) {
      die($ex->getMessage());
    }
  }

  public static function query(string $query): void
  {
    $pdo = self::connect();
    $pdo->query($query);
  }
}
