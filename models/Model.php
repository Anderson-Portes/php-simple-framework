<?php

abstract class Model
{
  protected string $primaryKey = 'id';
  protected string $table = '';
  protected PDO $conn;
  protected array $fields = [];

  public function __construct()
  {
    $this->conn = DB::connect();
  }

  public function all(): array
  {
    return $this->conn->query('select * from ' . $this->table)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function find($ref): array
  {
    $response = $this->conn->query('select * from ' . $this->table . " where " . $this->primaryKey . " = '" . $ref . "'")->fetch(PDO::FETCH_ASSOC);
    return $response ? $response : [];
  }

  public function create(array $data)
  {
    $fieldsStr = "(";
    $valuesStr = "(";
    foreach ($this->fields as $key => $field) {
      $fieldsStr .= $field . (array_key_last($this->fields) == $key ? ")" : ",");
      $valuesStr .= (is_string($data[$field]) ? "'" . $data[$field] . "'" : $data[$field]) . (array_key_last($this->fields) === $key ? ")" : ",");
    }
    $this->conn->query("insert into " . $this->table . " " . $fieldsStr . " values " . $valuesStr);
    return $this->last();
  }

  public function update(array $data, $ref): array | string
  {
    $setStr = "";
    foreach ($data as $key => $field) {
      $setStr .= $key . " = " . (is_string($field) ? "'" . $field . "'" : $field) . (array_key_last($data) === $key ? " " : ", ");
    }
    $this->conn->query("update " . $this->table . " set " . $setStr . " where " . $this->primaryKey . " = '" . $ref . "'");
    return $this->find($ref);
  }

  public function first(): array
  {
    return $this->conn->query('select * from ' . $this->table . " order by " . $this->primaryKey . " asc limit 1")->fetch(PDO::FETCH_ASSOC);
  }

  public function last(): array
  {
    return $this->conn->query('select * from ' . $this->table . " order by " . $this->primaryKey . " desc limit 1")->fetch(PDO::FETCH_ASSOC);
  }

  public function destroy($ref): void
  {
    $this->conn->query('delete from ' . $this->table . " where " . $this->primaryKey . " = '" . $ref . "'");
  }
}
