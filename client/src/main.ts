import './assets/main.css';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import App from './App.vue';
import router from './router';
import VueEasymde from 'vue3-easymde'
import "easymde/dist/easymde.min.css"

const app = createApp(App);
app.use(createPinia());
app.use(VueEasymde)
app.use(router);
app.mount('#app');