<?php

class LoginValidation extends Validation
{

  public $user = null;

  public function rules(): array
  {
    return [
      'email' => function ($email) {
        if (!isset($email))
          return "The email field is required";
        if (!is_string($email))
          return "The email field must to be a text";
        if (!$this->user = User::make()->firstWhere("email = '" . $email . "'"))
          return "Invalid login";
      },
      'password' => function ($password) {
        if (!isset($password))
          return "The password field is required";
        if (!is_string($password))
          return "The password field must to be a text";
        if (is_array($this->user) && !Hash::check($password, $this->user['password']))
          return "Invalid login";
      }
    ];
  }
}
