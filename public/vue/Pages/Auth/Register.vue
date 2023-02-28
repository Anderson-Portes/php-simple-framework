<template>
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-11 col-md-8 p-0">
        <div class="card">
          <h5 class="card-header">Register</h5>
          <div class="card-body">
            <form @submit.prevent="handleSubmit">
              <div class="form-floating mb-2">
                <input
                  :class="`form-control ${
                    form.errors.name ? 'is-invalid' : ''
                  }`"
                  id="name"
                  v-model="form.name"
                  placeholder="Name"
                />
                <label for="name">Name</label>
                <strong class="invalid-feedback" v-if="form.errors.name">
                  {{ form.errors.name }}
                </strong>
              </div>
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
                <i class="bi bi-save me-2"></i>Register
              </button>
              <p>
                Do you have an account ?
                <a :href="site_url + '/auth/login'">Login</a>
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
      name: "",
      email: "",
      password: "",
      errors: {},
    },
  }),
  methods: {
    async handleSubmit() {
      try {
        const { data } = await api.post("/auth/register", this.form);
        if (data.success) location.href = this.site_url + "/auth/login";
      } catch ({ response }) {
        this.form.errors = response.data.errors;
      }
    },
  },
};
</script>
