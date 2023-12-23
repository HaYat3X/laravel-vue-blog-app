import { createRouter, createWebHistory } from 'vue-router';
import CreateView from '../views/auth/sessions/CreateView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/session/create',
      name: 'session/create',
      component: CreateView
    },
  ]
})

export default router
