<?= component('layout.header')  ?>
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
  console.log(defineComponent.data());
  Vue.createApp(defineComponent).mount("#app");
</script>
<?= component('layout.footer')  ?>