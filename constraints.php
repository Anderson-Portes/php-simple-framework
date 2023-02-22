<?php

//App
define('APP_NAME', 'Simple Framework');
define('SITE_URL', 'http://localhost' . str_replace('index.php', '', $_SERVER['PHP_SELF']));
define('APP_ROOT', __DIR__);

//Database
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'minimal_framework');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
