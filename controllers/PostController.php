<?php

class PostController
{

  private Post $model;

  public function __construct()
  {
    $this->model = new Post;
  }

  public function index(): array | string
  {
    return $this->model->all();
  }

  public function find($id): array | string
  {
    return $this->model->find($id);
  }

  public function create(): array | string
  {
    $data = request()->toArray();
    return $this->model->create($data);
  }

  public function update($id): array | string
  {
    $data = request()->toArray();
    return $this->model->update($data, $id);
  }

  public function destroy($ref): string | array
  {
    $this->model->destroy($ref);
    return ['message' => 'Post deleted successfully.'];
  }
}
