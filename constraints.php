<?php

//App
define('APP_NAME', 'Simple Framework');
define('APP_PROTOCOL', (isset($_SERVER['https']) && $_SERVER['https'] != "off" ? "https" : "http") . "://");
define('APP_DOMAIN', APP_PROTOCOL . ($_SERVER['SERVER_NAME'] ?? ''));
define('SITE_URL', APP_DOMAIN . str_replace('/index.php', '', $_SERVER['PHP_SELF']));
define('APP_ROOT', __DIR__);

//Database
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'minimal_framework');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
