<?php

class RegisterController
{
  private User $model;

  public function __construct()
  {
    $this->model = new User;
  }

  public function index()
  {
    return react('Auth.Register');
  }

  public function create()
  {
    $data = RegisterValidation::make();
    $data['password'] = bcrypt($data['password']);
    $data['access_token'] = base64_encode(json_encode($data));
    $this->model->create($data);
    return json(['success' => true, 'message' => 'Account created successfully']);
  }
}
