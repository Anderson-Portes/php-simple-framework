<?php

class PostController
{

  private Post $model;

  public function __construct()
  {
    $this->model = new Post;
  }

  public function index()
  {
    $posts = $this->model->all();
    if (request()->toArray()['fetch'] ?? false) return $posts;
    return vue('post.index', compact('posts'));
  }

  public function find($id)
  {
    return $this->model->find($id);
  }

  public function new()
  {
    return vue('post.New');
  }

  public function create()
  {
    return $this->model->create(request()->toArray());
  }

  public function edit($id)
  {
    $post = $this->model->find($id);
    return vue('post.edit', compact('post'));
  }

  public function update($id)
  {
    return request()->toArray();
    return $this->model->update(request()->toArray(), $id);
  }

  public function destroy($id)
  {
    $this->model->destroy($id);
    session()->set('success', 'Post deleted successfully');
    return redirect('/post/');
  }
}
