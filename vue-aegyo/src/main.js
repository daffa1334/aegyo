import { createApp } from "vue";
import App from "./App.vue";
import axios from "axios";

import { createWebHistory, createRouter } from "vue-router";
import Edit from "./components/Edit.vue";
import Tambah from "./components/Tambah.vue";
import articles from "./components/articles";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: "/edit/:id", name: "Edit", component: Edit },
    { path: "/tambah", name: "Tambah", component: Tambah },
    { path: "/articles", name: "articles", component: articles },
  ],
  base: "/",
});
const app = createApp(App);
app.use(router);
app.config.globalProperties.axios = axios;
app.mount("#app");
