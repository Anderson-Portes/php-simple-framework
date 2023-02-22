<?php

class User extends Model
{
  protected string $table = 'users';
  protected array $fields = [
    'name',
    'email',
    'password',
    'access_token'
  ];
}
