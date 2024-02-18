<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue'
import ArticleCard from '@/components/elements/ArticleCard.vue'
import Pagination from '@/components/elements/Pagination.vue'
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import type { Article } from '@/types/article'
import { getData } from '@/services/api'

const router = useRouter()
const articles = ref<Article[]>([])
const currentPage = ref(1)
const lastPage = ref()

/**
 * 指定されたページに基づいて公開記事一覧を取得する
 * @param {number} page
 */
const fetchArticles = async (page: number) => {
  const url = `api/article/get_published_article?page=${page}`
  const getPublishedArticle = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (getPublishedArticle.error) {
    router.push('/error')
  }

  articles.value = getPublishedArticle.articles.data
  currentPage.value = getPublishedArticle.articles.current_page
  lastPage.value = getPublishedArticle.articles.last_page
}

onMounted(() => {
  // 最初のページのための初期取得（currentPage初期値1で取得）
  fetchArticles(currentPage.value)
})

/**
 * 現在のページを変更し、そのページに応じて記事を取得する
 * @param {number} page
 */
const changePage = (page: number) => {
  fetchArticles(page)
}
</script>

<template>
  <WithSidebarLayout>
    <div class="content-container">
      <h2>Articles</h2>

      <div class="article">
        <ArticleCard v-for="article in articles" :key="article.id" :-article-slug="article.slug"
          :-featured-imgae="`http://127.0.0.1:8000/storage/featured_image/${article.featured_image}`"
          :-article-title="article.title" :-article-created-at="article.created_at.slice(0, 10)" />
      </div>

      <Pagination v-if="articles.length" :current-page="currentPage" :last-page="lastPage" @changePage="changePage" />
    </div>
  </WithSidebarLayout>
</template>

<style scoped lang="scss">
.content-container {
  h2 {
    font-weight: bold;
    font-size: 30px;
    margin-bottom: 20px;
    color: #333333;
  }
}

@media only screen and (min-width: 768px) and (max-width: 1023px) {
  .content-container {
    h2 {
      font-size: 32px;
    }

    .article {
      display: flex;
      flex-wrap: wrap;
      column-gap: 20px;
    }
  }
}

@media only screen and (min-width: 1024px) {
  .content-container {
    h2 {
      font-size: 32px;
    }

    .article {
      display: flex;
      flex-wrap: wrap;
      column-gap: 20px;
    }
  }
}
</style>
