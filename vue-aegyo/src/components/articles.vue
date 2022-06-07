<template>
  <div class="Container">
    <div class="card">
      <div class="card-body">
        <h2 align="center">Data Articles</h2>
        <a href="/tambah" class="btn btn-success">Tambah</a>

        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>Title</th>
              <th>category</th>
              <th>description</th>
              <th>content</th>
              <th>status</th>
              <th>CRUD</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="a in articles" :key="a.id">
              <td>{{ a.title }}</td>
              <td>{{ a.category_id }}</td>
              <td>{{ a.description }}</td>
              <td>{{ a.content }}</td>
              <td>{{ a.status }}</td>
              <td>
                <a v-bind:href="'/edit/' + a.id" class="btn btn-success"
                  >Edit</a
                >

                <button class="btn btn-danger" v-on:click="hapus(a.id)">
                  Hapus
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Articles",
  data() {
    return {
      articles: [],
    };
  },
  created() {
    this.axios
      .get(`http://localhost/Aegyo.id/public/api/articles`)
      .then((result) => {
        this.articles = result.data;
        console.log(result.data);
      });
  },
  methods: {
    hapus(id) {
      this.axios
        .delete(`http://localhost/Aegyo.id/public/api/articles/${id}`)
        .then(() => {
          let i = this.articles.map((item) => item.id).indexOf(id);
          this.articles.splice(i, 1);
        });
    },
  },
};
</script>
