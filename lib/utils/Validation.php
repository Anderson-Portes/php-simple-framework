<?php

abstract class Validation
{

  private array $request;
  public array $errors = [];

  public function __construct()
  {
    $this->request = request()->toArray();
  }

  public function values()
  {
    $validatedFields = [];
    $rules = $this->rules();
    foreach ($rules as $field => $validation) {
      $currentField = $this->request[$field] ?? null;
      $result = $validation($currentField);
      if (is_string($result)) $this->errors[$field] = $result;
      else $validatedFields[$field] = $currentField;
    }
    return empty($this->errors) ? $validatedFields : $this->throwErrors();
  }

  public function throwErrors()
  {
    if (request()->header('Content-Type') == "application/json") {
      die(json(['errors' => $this->errors], 412));
    }
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
