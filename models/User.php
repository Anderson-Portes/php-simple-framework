<?php

class User extends Model
{
  use TableIsModel;

  protected array $fields = [
    'name',
    'email',
    'password',
    'access_token'
  ];
}
