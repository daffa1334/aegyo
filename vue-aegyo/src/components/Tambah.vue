<template>
  <div class="container">
    <form @submit.prevent="simpanarticles()">
      Title
      <input type="text" name="title" v-model="title" class="form-control" />
      <br />
      Category
      <input
        type="text"
        name="category_id"
        v-model="category_id"
        class="form-control"
      />
      <br />
      Description
      <input
        type="text"
        name="description"
        v-model="description"
        class="form-control"
      />
      <br />
      Content
      <input
        type="text"
        name="content"
        v-model="content"
        class="form-control"
      />
      <br />
      Status
      <select name="status" v-model="status" class="form-control">
        <option></option>
        <option
          v-for="status in liststatus"
          :key="status.key"
          v-bind:value="status.key"
          >{{ status.val }}</option
        >
      </select>
      <br />

      <button class="btn btn-primary" style="float: right" type="submit">
        SIMPAN
      </button>
      <br />
      <div v-bind:class="style_msg">
        <div v-if="error == true">
          <div v-for="msg in message" :key="msg.id">
            <p v-for="m in msg" :key="m.id">{{ m }}</p>
          </div>
        </div>
        <p v-else>{{ message }}</p>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  name: "Tambah",
  data() {
    return {
      articles: {},
      liststatus: [
        { key: "publish", val: "Publish" },
        { key: "unpublish", val: "Unpublish" },
      ],

      title: "",
      category_id: "",
      description: "",
      content: "",
      status: "",
      style_msg: "",
      message: "",
      error: false,
    };
  },
  methods: {
    async simpanarticles() {
      var dataarticles = {
        title: this.title,
        category_id: this.category_id,
        description: this.description,
        content: this.content,
        status: this.status,
      };
      this.axios
        .post("http://localhost/Aegyo.id/public/api/articles", dataarticles)
        .then(
          (res) => {
            console.log(res);
          
            if (res.data.status == true) {
              this.error = false;
              this.message = res.data.message;
              this.style_msg = "alert alert-success";
              setTimeout(() => {
                this.$router.push("/articles");
              }, 2000);
            } else {
              this.error = true;
              this.message = res.data.message;
              this.style_msg = "alert alert-danger";
            }

           
          }
         
        );
    },
  },
};
</script>
