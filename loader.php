<?php

function load(string $path): void
{
  $currentDirs = scandir($path);
  $blockedDirs = ['.', '..', 'index.php', 'loader.php', '.htaccess'];
  $filteredDirs = array_filter($currentDirs, fn (string $dir) => !in_array($dir, $blockedDirs));
  array_map(
    function (string $dir) use ($path) {
      $absolutePath = $path . "\\" . $dir;
      str_ends_with($absolutePath, '.php') ? require_once $absolutePath : load($absolutePath);
    },
    $filteredDirs
  );
}

load(__DIR__);
