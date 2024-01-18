import { createRouter, createWebHistory } from 'vue-router'
let contactCompleted = true

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'PublishedArticles',
      component: () => import('../views/PublishedArticlesView.vue')
    },
    {
      path: '/:slug',
      name: 'ArticleDetail',
      component: () => import('../views/ArticleDetailView.vue')
    },
    {
      path: '/search',
      name: 'ArticleSearch',
      component: () => import('../views/ArticleSearchView.vue')
    },
    {
      path: '/search_result',
      name: 'ArticleSearchResults',
      component: () => import('../views/ArticleSearchResultsView.vue')
    },
    {
      path: '/contact',
      name: 'Contact',
      component: () => import('../views/ContactView.vue')
    },
    {
      path: '/contact_completion',
      name: 'ContactCompletion',
      component: () => import('../views/ContactCompletionView.vue')
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
    }
  ]
})

export default router
