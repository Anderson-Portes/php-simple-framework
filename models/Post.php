<?php

class Post extends Model
{
  protected string $table = 'posts';
  protected array $fields = [
    'title',
    'content'
  ];
}
