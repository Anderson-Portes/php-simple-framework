const { useState } = React;
const { site_url } = globalProps;

const Page = ({ site_url } = globalProps || {}) => {
  const [form, setForm] = useState({
    email: "",
    password: "",
    errors: {},
  });
  const handleChange = (e) => {
    setForm({
      ...form,
      [e.target.name || e.target.id]: e.target.value,
    });
  };
  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      const { data } = await api.post("/auth/register", form);
      if (data.success) location.href = site_url + "/auth/login";
    } catch ({ response }) {
      setForm({
        ...form,
        errors: response.data.errors,
      });
    }
  };
  return (
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-11 col-md-8 p-0">
          <div class="card">
            <h5 class="card-header">Register</h5>
            <div class="card-body">
              <form onSubmit={handleSubmit}>
                <div class="form-floating mb-2">
                  <input
                    className={`form-control ${
                      form.errors.name ? "is-invalid" : ""
                    }`}
                    id="name"
                    placeholder="Name"
                    onChange={handleChange}
                  />
                  <label for="name">Name</label>
                  {form.errors.name && (
                    <strong class="invalid-feedback">{form.errors.name}</strong>
                  )}
                </div>
                <div class="form-floating mb-2">
                  <input
                    type="email"
                    className={`form-control ${
                      form.errors.email ? "is-invalid" : ""
                    }`}
                    id="email"
                    placeholder="Email"
                    onChange={handleChange}
                  />
                  <label for="email">Email</label>
                  {form.errors.email && (
                    <strong class="invalid-feedback">
                      {form.errors.email}
                    </strong>
                  )}
                </div>
                <div class="form-floating mb-2">
                  <input
                    type="password"
                    className={`form-control ${
                      form.errors.password ? "is-invalid" : ""
                    }`}
                    id="password"
                    placeholder="Password"
                    onChange={handleChange}
                  />
                  <label for="password">Password</label>
                  {form.errors.password && (
                    <strong class="invalid-feedback">
                      {form.errors.password}
                    </strong>
                  )}
                </div>
                <button class="btn btn-sm btn-primary">
                  <i class="bi bi-save me-2"></i>Login
                </button>
                <p>
                  Dont have an account ?
                  <a href={site_url + "/auth/register"}>Register</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};
