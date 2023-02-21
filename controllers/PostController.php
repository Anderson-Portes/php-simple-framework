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
    return page('post.index', compact('posts'));
  }

  public function find($id)
  {
    return $this->model->find($id);
  }

  public function new()
  {
    return page('post.new');
  }

  public function create()
  {
    $this->model->create(request()->toArray());
    session()->set('success', 'Post created successfully!');
    return redirect('/post/');
  }

  public function edit($id)
  {
    $post = $this->model->find($id);
    return page('post.edit', compact('post'));
  }

  public function update($id)
  {
    $this->model->update(request()->toArray(), $id);
    session()->set('success', 'Post updated successfully!');
    return redirect('/post/');
  }

  public function destroy($id)
  {
    $this->model->destroy($id);
    session()->set('success', 'Post deleted successfully');
    return redirect('/post/');
  }
}
