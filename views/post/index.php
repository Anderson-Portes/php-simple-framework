<?= component('layout.header')  ?>
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-11 col-md-8 p-0">
      <div class="card">
        <div class="card-header">
          <h5>Posts list</h5>
          <a href="<?= site_url('post/new') ?>" class="btn btn-sm btn-primary">
            <i class="bi bi-plus me-2"></i>Add new post
          </a>
        </div>
        <div class="card-body">
          <?= component('messages.success') ?>
          <div class="table-responsive">
            <table class="table table-borderless table-hover">
              <thead>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
              </thead>
              <tbody>
                <?php foreach ($posts as $post) : ?>
                  <tr>
                    <td><?= $post['id'] ?></td>
                    <td><?= $post['title'] ?></td>
                    <td><?= $post['content'] ?></td>
                    <td>
                      <a href="<?= site_url('/post/' . $post['id'] . '/edit') ?>" class="btn btn-sm btn-success">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <form action="<?= site_url('/post/' . $post['id']) ?>" class="d-inline" method="POST">
                        <?= form_method('DELETE') ?>
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this post?')">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
                <?php if (empty($posts)) : ?>
                  <tr>
                    <td colspan="4">No posts avaliable...</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= component('layout.footer')  ?>