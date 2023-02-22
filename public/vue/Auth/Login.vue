<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-11 col-md-8 p-0">
        <div class="card">
          <h5 class="card-header">Login</h5>
          <div class="card-body">
            <form @submit.prevent="handleSubmit">
              <div class="form-floating mb-2">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  v-model="form.email"
                  placeholder="Email"
                />
                <label for="email">Email</label>
              </div>
              <div class="form-floating mb-2">
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  v-model="form.password"
                  placeholder="Password"
                />
                <label for="password">Password</label>
              </div>
              <button class="btn btn-sm btn-primary">
                <i class="bi bi-save me-2"></i>Login
              </button>
              <p>
                Dont have an account ?
                <a :href="site_url + '/auth/register'">Register</a>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const defineComponent = {
  data: () => ({
    form: {
      email: "",
      password: "",
    },
  }),
  methods: {
    async handleSubmit() {
      try {
        const { data } = await axios.post(
          this.site_url + "/auth/login",
          this.form
        );
        if (data.success) location.href = this.site_url + "/";
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
