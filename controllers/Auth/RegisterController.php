<?php

class RegisterController
{
  private User $model;
  private Request $request;

  public function __construct()
  {
    $this->request = request();
    $this->model = new User;
  }

  public function index()
  {
    return vue('Auth.Register');
  }

  public function create()
  {
    $data = $this->request->only('name', 'email', 'password');
    if ($this->model->firstWhere("email = '" . $data['email'] . "'")) {
      return json([
        'errors' => [
          'email' => 'Email already exists'
        ]
      ], 400);
    }
    $data['password'] = Hash::make($data['password']);
    $this->model->create($data);
    return json(['success' => true, 'message' => 'Account created successfully']);
  }
}
