<?= component('layout.header')  ?>
<div class="container py-4">
  <div id="app"></div>
</div>
<script>
  const post = <?= json($post) ?>;
</script>
<?= vue('post.edit') ?>
<?= component('layout.footer')  ?>