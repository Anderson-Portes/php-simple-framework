<template>
  <div class="row justify-content-center">
    <div class="col-11 col-md-8 p-0">
      <div class="card">
        <div class="card-header">
          <h5>Create New Posts</h5>
          <a :href="site_url + 'post'" class="btn btn-sm btn-primary">
            <i class="bi bi-arrow-left me-2"></i>Back To List
          </a>
        </div>
        <div class="card-body">
          <div
            class="alert alert-success alert-dismissible fade show"
            v-if="success"
          >
            {{ success }}
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="alert"
              aria-label="Close"
              @click="success = null"
            ></button>
          </div>
          <form @submit.prevent="handleSubmit">
            <div class="form-floating mb-2">
              <input
                class="form-control"
                id="title"
                placeholder="Title"
                v-model="post.title"
                required
              />
              <label for="title">Title</label>
            </div>
            <div class="form-floating mb-2">
              <textarea
                class="form-control"
                placeholder="Content"
                v-model="post.content"
                id="content"
                style="height: 150px; resize: none"
                required
              ></textarea>
              <label for="content">Content</label>
            </div>
            <button class="btn btn-sm btn-primary">
              <i class="bi bi-save me-2"></i>Save
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const defineComponent = {
  data: () => ({
    post: {
      title: "",
      content: "",
    },
    success: null,
  }),
  methods: {
    async handleSubmit() {
      this.success = null;
      const { title, content } = this.post;
      const response = await fetch(this.site_url + "post", {
        method: "POST",
        body: JSON.stringify({ title, content }),
      }).catch(console.log);
      await response.json().catch(console.log);
      this.success = "Post created successfuly!!";
      this.resetForm();
    },
    resetForm() {
      this.post.title = this.post.content = "";
    },
  },
};
</script>
