import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'PublicArticle',
      component: () => import('../views/articles/PublicList.vue')
    },
    {
      path: '/:slug',
      name: 'ShowArticle',
      component: () => import('../views/articles/Show.vue')
    },
    {
      path: '/search',
      name: 'SearchArticle',
      component: () => import('../views/articles/Search.vue')
    },
    {
      path: '/search/result',
      name: 'SearchResultArticle',
      component: () => import('../views/articles/SearchResults.vue')
    },
    {
      path: '/contact/submit',
      name: 'SubmitContact',
      component: () => import('../views/contacts/Submit.vue')
    },
    {
      path: '/contact/complete',
      name: 'CompleteContact',
      component: () => import('../views/contacts/Complete.vue')
    },
    {
      path: '/admin/login',
      name: 'AdminLogin',
      component: () => import('../views/admins/Login.vue')
    },
    {
      path: '/article',
      name: 'Article',
      component: () => import('../views/articles/List.vue')
    },
    {
      path: '/article/submit',
      name: 'SubmitArticle',
      component: () => import('../views/articles/Submit.vue')
    },
    {
      path: '/article/:articleId/edit',
      name: 'ArticleEditing',
      component: () => import('../views/articles/Edit.vue')
    },
    {
      path: '/contact',
      name: 'Contact',
      component: () => import('../views/contacts/List.vue')
    },
    {
      path: '/about/me',
      name: 'AboutMe',
      component: () => import('../views/abouts/Me.vue')
    },
    {
      path: '/about/blog',
      name: 'AboutBlog',
      component: () => import('../views/abouts/Blog.vue')
    },
    {
      path: '/privacy-policy',
      name: 'PrivacyPolicy',
      component: () => import('../views/PrivacyPolicyView.vue')
    },
    {
      path: '/:pathMatch(.*)*/',
      name: 'NotFound',
      component: () => import('../views/NotFound.vue')
    },
    {
      path: '/server-error',
      name: 'ServerError',
      component: () => import('../views/ServerError.vue')
    }
  ]
})

export default router
