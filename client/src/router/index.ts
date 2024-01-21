import { createRouter, createWebHistory } from 'vue-router'

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
      path: '/administrator-login',
      name: 'AdministratorLogin',
      component: () => import('../views/AdministratorLoginView.vue')
    },
    {
      path: '/admin_dashboard',
      name: 'AdminDashboard',
      component: () => import('../views/AdminDashboardView.vue')
    },
    {
      path: '/posted_articles',
      name: 'PostedArticles',
      component: () => import('../views/PostedArticlesView.vue')
    },
    {
      path: '/article_submission',
      name: 'ArticleSubmission',
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
