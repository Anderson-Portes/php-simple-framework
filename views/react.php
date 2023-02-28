<?= component('layout.header', ['nav' => true, 'react' => true, 'axios' => true])  ?>
<div id="root"></div>
<script>
  const globalProps = <?= json($data) ?>;
</script>
<script type="text/babel" src="<?= SITE_URL . "\\public\\react\\Pages\\" . $path . ".jsx" ?>"></script>
<script type="text/babel">ReactDOM.render(<Page /> ,document.getElementById('root'));</script>
<?= component('layout.footer')  ?>