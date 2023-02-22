<?php

class RegisterController
{
  private User $model;

  public function __construct()
  {
    GuestMiddleware::run();
    $this->model = new User;
  }

  public function __invoke()
  {
    $data = RegisterValidation::make();
    $data['password'] = bcrypt($data['password']);
    $data['access_token'] = base64_encode(json_encode($data));
    $user = $this->model->create($data);
    return json(['success' => true, 'message' => 'Account created successfully', 'data' => $user]);
  }
}
