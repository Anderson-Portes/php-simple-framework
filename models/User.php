<?php

class User extends Model
{
  protected string $table = 'user';
  protected array $fields = [
    'name',
    'email',
    'password',
    'access_token'
  ];
}
