import './bootstrap';

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import feather from 'feather-icons';
feather.replace();

const app = createApp(App);

app.use(router);
app.mount('#app');
