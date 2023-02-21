<?= component('layout.header')  ?>
<div class="container py-4">
  <div id="app"></div>
</div>
<?= vue('post.index'); ?>
<?= component('layout.footer')  ?>