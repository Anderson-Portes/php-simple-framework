<?= component('layout.header', ['nav' => true, 'axios' => true])  ?>
<script src="<?= asset('/js/vue.global.js') ?>"></script>
<div id="app">
  <?php require_once APP_ROOT . "\\public\\vue\\Pages\\" . $path . ".vue" ?>
</div>
<script>
  const appDiv = document.getElementById("app");
  appDiv.after(appDiv.querySelector("script") || '');
  appDiv.innerHTML = appDiv.querySelector("template").innerHTML;
  const globalData = <?= json($data) ?>;
  const pageData = defineComponent.data ? defineComponent.data() : {};
  defineComponent.data = () => ({
    ...globalData,
    ...pageData
  });
  Vue.createApp(defineComponent).mount("#app");
</script>
<?= component('layout.footer')  ?>