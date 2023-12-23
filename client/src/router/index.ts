import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/session/create',
      name: 'session/create',
      component: () => import('../views/auth/sessions/CreateView.vue')
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/admin/dashboards/ShowView.vue')
    },
    {
      path: '/admin/blog',
      name: 'admin/blog',
      component: () => import('../views/PostedArticlesView.vue')
    },
  ]
})

export default router
