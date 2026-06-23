import './bootstrap';

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// import axios & AppStorage
import axios from 'axios';
import AppStorage from './Helpers/AppStorage';


// globally set token using Interceptors
axios.interceptors.request.use(function (config) {
  const token = AppStorage.getToken();
  
  config.headers['Accept'] = 'application/json'; 
  
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
}, function (error) {
  return Promise.reject(error);
});

// import notification class
import Notification from '@/Helpers/Notification';
window.Notification = Notification;


// import sweetalert2
import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  },
});
window.Toast = Toast;

const app = createApp(App);

app.use(router);
app.mount('#app');
