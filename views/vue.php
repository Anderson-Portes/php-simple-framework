<?= component('layout.header', ['nav' => true])  ?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<div id="app">
  <?php require_once APP_ROOT . "\\public\\vue\\" . $path . ".vue" ?>
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