import { createRouter, createWebHistory } from 'vue-router';
import CreateView from '../views/auth/sessions/CreateView.vue';
import HomeView from '../views/HomeView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/session/create',
      name: 'session/create',
      component: CreateView
    },
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
  ]
})

export default router
