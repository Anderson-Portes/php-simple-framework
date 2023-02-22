<?php

abstract class Validation
{

  private Request $request;
  private array $errors = [];

  public function __construct()
  {
    $this->request = request();
  }

  public function values()
  {
    $validatedFields = [];
    $request = $this->request->toArray();
    $rules = $this->rules();
    foreach ($rules as $field => $validation) {
      $currentField = $request[$field] ?? null;
      $result = $validation($currentField);
      if (is_string($result)) $this->errors[$field] = $result;
      else $validatedFields[$field] = $currentField;
    }
    return empty($this->errors) ? $validatedFields : $this->throwErrors();
  }

  public function throwErrors()
  {
    if ($this->request->wantsJson()) {
      die(json(['errors' => $this->errors], 412));
    }
    session()->set('errors', $this->errors);
  }

  public function rules()
  {
    return [];
  }

  public static function make(bool $returnObject = false): array | object
  {
    $obj = new static;
    $values = $obj->values();
    return $returnObject ? $obj : $values;
  }
}
