<?php

class RegisterValidation extends Validation
{
  public function rules(): array
  {
    return [
      'name' => function ($name) {
        if (!isset($name))
          return "The name is required.";
        if (!is_string($name))
          return "The name must to me a text of 255 characters";
        if (strlen($name) > 255)
          return "The name must to me a max of 255 characters";
      },
      'email' => function ($email) {
        if (!isset($email))
          return "The email is required.";
        if (!is_string($email))
          return "The email must to me a text of 255 characters";
        if ((new User)->firstWhere("email = '" . $email . "'"))
          return 'Email already exists';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
          return "This field must to be a valide email";
        if (strlen($email) > 255)
          return "The email must to me a max of 255 characters";
      },
      'password' => function ($password) {
        if (!isset($password))
          return "The password is required.";
        if (!is_string($password))
          return "The password must to me a text of 255 characters";
        if (strlen($password) < 6)
          return "The password must to me a minimum of 6 characters";
        if (strlen($password) > 255)
          return "The password must to me a max of 255 characters";
      }
    ];
  }
}
