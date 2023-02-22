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
                  :class="`form-control ${
                    form.errors.email ? 'is-invalid' : ''
                  }`"
                  id="email"
                  v-model="form.email"
                  placeholder="Email"
                />
                <label for="email">Email</label>
                <strong class="invalid-feedback" v-if="form.errors.email">
                  {{ form.errors.email }}
                </strong>
              </div>
              <div class="form-floating mb-2">
                <input
                  type="password"
                  :class="`form-control ${
                    form.errors.password ? 'is-invalid' : ''
                  }`"
                  id="password"
                  v-model="form.password"
                  placeholder="Password"
                />
                <label for="password">Password</label>
                <strong class="invalid-feedback" v-if="form.errors.password">
                  {{ form.errors.password }}
                </strong>
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
      errors: {},
    },
  }),
  methods: {
    async handleSubmit() {
      try {
        const { data } = await api.post("/auth/login", this.form);
        if (data.success) location.href = this.site_url + "/";
      } catch ({ response }) {
        this.form.errors = response.data.errors;
      }
    },
  },
};
</script>
