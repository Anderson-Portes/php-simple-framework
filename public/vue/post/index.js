Vue.createApp({
  template: `
    <div class="row justify-content-center">
      <div class="col-11 col-md-8 p-0">
        <div class="card">
          <div class="card-header">
            <h5>Post List</h5>
            <a :href="site_url + 'post/new'" class="btn btn-sm btn-primary">
              <i class="bi bi-plus me-2"></i>Add new post
            </a>
          </div>
          <div class="card-body">
            <div class="alert alert-success alert-dismissible fade show" v-if="success">
              {{ success }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="success = null"></button>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-borderless">
                <thead>
                  <th>#</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <tr v-for="post in posts">
                    <td>{{ post.id }}</td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.content }}</td>
                    <td>
                      <a :href="site_url +'post/'+post.id+'/edit'" class="btn btn-sm btn-success me-1">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <button class="btn btn-sm btn-danger" @click="deletePost(post.id)">
                        <i class="bi bi-trash"></i>
                      </button>
                    <td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    `,
  data: () => ({
    posts: [],
    site_url: config.site_url,
    success: null,
  }),
  mounted() {
    this.fetchPosts();
  },
  methods: {
    async fetchPosts() {
      const response = await fetch(config.site_url + "post?fetch=true");
      const data = await response.json().catch(console.log);
      this.posts = data;
    },
    deletePost(id) {
      if (!confirm("Do you want to delete this post?")) return;
      fetch(config.site_url + "post/" + id, {
        method: "DELETE",
      }).then(() => {
        this.success = "Post deleted successfully";
        this.fetchPosts();
      });
    },
  },
}).mount("#app");
