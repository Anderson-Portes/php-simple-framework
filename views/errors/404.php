<?= component('layout.header') ?>
<div class="d-flex align-items-center justify-content-center vh-100">
  <div class="text-center">
    <h1 class="display-1 fw-bold">404</h1>
    <p class="fs-3">
      <?= $message ?>
    </p>
    <a href="<?= site_url() ?>" class="btn btn-primary">
      <?= auth()->check() ? 'Go Home' : 'Go Login' ?>
    </a>
  </div>
</div>
<?= component('layout.footer') ?>