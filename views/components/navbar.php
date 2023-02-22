<nav class="navbar navbar-expand-lg border-bottom shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url() ?>"><?= APP_NAME ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (auth()->check()) : ?>
          <li class="nav-item">
            <form action="<?= site_url('/auth/logout') ?>" method="post">
              <button class="btn text-danger">Logout</button>
            </form>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/auth/login') ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/auth/register') ?>">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>