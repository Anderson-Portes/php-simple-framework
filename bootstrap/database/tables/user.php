<?php

return [
  'name' => 'varchar(255)',
  'email' => 'varchar(255) unique',
  'password' => 'varchar(255)',
  'access_token' => 'text',
  'updated_at' => 'timestamp'
];
