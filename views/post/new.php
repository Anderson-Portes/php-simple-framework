<?= component('layout.header')  ?>
<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-11 col-md-8 p-0">
      <div class="card">
        <div class="card-header">
          <h5>Create New Posts</h5>
          <a href="<?= site_url('post') ?>" class="btn btn-sm btn-primary">
            <i class="bi bi-arrow-left me-2"></i>Back To List
          </a>
        </div>
        <div class="card-body">
          <form action="<?= site_url('/post') ?>" method="POST">
            <div class="form-floating mb-2">
              <input class="form-control" id="title" placeholder="Title" name="title" required>
              <label for="title">Title</label>
            </div>
            <div class="form-floating mb-2">
              <textarea class="form-control" placeholder="Content" name="content" id="content" style="height: 150px;resize: none;" required></textarea>
              <label for="content">Content</label>
            </div>
            <button class="btn btn-sm btn-primary">
              <i class="bi bi-save me-2"></i>Save
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= component('layout.footer')  ?>