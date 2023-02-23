<?php

require_once __DIR__ . "\\constraints.php";
require_once __DIR__ . "\\bootstrap\\database\\DB.php";

if (empty($argv)) die;

if (in_array("migrate", $argv)) {
  if (in_array("--truncate", $argv))
    DB::query("drop database if exists " . DB_NAME . ";create database " . DB_NAME . ";");
  $databaseDir = __DIR__ . "\\bootstrap\\database\\tables";
  if (!is_dir($databaseDir)) die;
  $tables = array_filter(scandir($databaseDir), fn ($dir) => !in_array($dir, ['.', '..']) && str_ends_with($dir, '.php'));
  foreach ($tables as $tableName) {
    $table = require_once $databaseDir . "\\" . $tableName;
    $tableName = substr($tableName, 0, -4);
    if (!isset($table['id']))
      $table = ['id' => 'int auto_increment primary key'] + $table;
    $query = "create table if not exists " . $tableName . "(";
    foreach ($table as $field => $type) {
      $query .= $field . " " . $type;
      if (array_key_last($table) != $field)
        $query .= ",";
    }
    $query .= ");";
    DB::query($query);
  }
}
