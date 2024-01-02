import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: () => import('../views/PublishedArticlesView.vue')
    },
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
      path: '/admin/article',
      name: 'admin/article',
      component: () => import('../views/PostArticleManagementView.vue')
    },
    {
      path: '/admin/article/create',
      name: 'admin/article/create',
      component: () => import('../views/ArticleSubmissionView.vue')
    },
    {
      path: '/admin/article/edit/:article_id',
      name: 'admin/article/edit',
      component: () => import('../views/ArticleEditingView.vue')
    },
    {
      path: '/:pathMatch(.*)*/',
      name: 'NotFound',
      component: () => import('../views/NotFound.vue')
    },
    {
      path: '/error',
      name: 'ServerError',
      component: () => import('../views/ServerError.vue')
    },
  ]
})

export default router
