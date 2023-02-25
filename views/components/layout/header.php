<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= APP_NAME ?></title>
  <link rel="stylesheet" href="<?= site_url('/public/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= site_url('/public/css/bootstrap-icons.css') ?>">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap');

    * {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
  <?php if (isset($react) && $react) : ?>
    <script src="<?= site_url('/public/js/react.production.min.js') ?>"></script>
    <script src="<?= site_url('/public/js/react-dom.production.min.js') ?>"></script>
    <script src="<?= site_url('/public/js/babel.js') ?>"></script>
  <?php endif; ?>
</head>

<body>
  <?= isset($nav) && $nav ? component('navbar') : '' ?>
  <?php if (isset($axios) && $axios) : ?>
    <script src="<?= site_url('/public/js/axios.min.js') ?>"></script>
    <script>
      const api = axios.create({
        baseURL: "<?= site_url() ?>",
        headers: {
          Accept: "application/json"
        }
      });
    </script>
  <?php endif; ?>