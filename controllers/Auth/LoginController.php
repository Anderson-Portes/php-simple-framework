<?php

class LoginController
{
  private User $model;
  private Request $request;

  public function __construct()
  {
    GuestMiddleware::run();
    $this->request = request();
    $this->model = new User;
  }

  public function index()
  {
    return vue('Auth.Login');
  }

  public function create()
  {
    $data = $this->request->only('email', 'password');
    $user = $this->model->firstWhere("email = '" . $data['email'] . "'");
    if (!$user || !Hash::check($data['password'], $user['password'])) {
      return json([
        'errors' => [
          'email' => 'Invalid login!'
        ]
      ], 400);
    }
    auth()->login($user);
    return json(['success' => true, 'message' => 'Logged Successfully']);
  }
}
