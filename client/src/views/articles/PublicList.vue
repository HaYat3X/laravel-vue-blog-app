<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/user/WithSidebarLayout.vue'
import Pagination from '@/components/elements/Pagination.vue'
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import type { Article } from '@/types/article'
import { getData } from '@/services/api'
import { useHead } from '@unhead/vue'

useHead({
  title: 'Hayate Tech Lab',
  meta: [
    {
      name: 'discription',
      content:
        'Hayate Tech Hubへようこそ。Hayate Tech Hubでは、私がこれまで実装した技術や使用した技術の記録と共有しています。'
    }
  ]
})

const router = useRouter()
const articles = ref<Article[]>([])
const currentPage = ref(1)
const lastPage = ref()

/**
 * 指定されたページに基づいて公開記事一覧を取得する
 * @param {number} page
 */
const fetchArticles = async (page: number) => {
  const url = `/article/post/public?page=${page}`
  const getPublishedArticle = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (getPublishedArticle.error) {
    router.push('/server-error')
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
    <h2>Articles</h2>

    <div class="article">
      <q-card class="my-card" v-for="article in articles" :key="article.id">
        <a :href="`/${article.slug}`">
          <!-- <img
            :src="`http://127.0.0.1:8000/storage/featured_image/${article.featured_image}`"
            alt=""
          /> -->

          <img
            :src="`https://x162-43-70-220.static.shin-vps.jp/storage/featured_image/${article.featured_image}`"
            alt=""
          />

          <q-card-section class="q-pa-none">
            <p class="card-title">
              {{ article.title }}
            </p>

            <small> {{ article.created_at.slice(0, 10) }}に公開 </small>
          </q-card-section>
        </a>
      </q-card>
    </div>

    <Pagination
      v-if="articles.length"
      :current-page="currentPage"
      :last-page="lastPage"
      @changePage="changePage"
    />
  </WithSidebarLayout>
</template>

<style scoped lang="scss">
h2 {
  font-weight: bold;
  font-size: 30px;
  color: #333333;
  line-height: 1;
  margin-bottom: 15px;

  @media only screen and (min-width: 768px) {
    font-size: 32px;
  }
}

.article {
  @media only screen and (min-width: 768px) {
    display: flex;
    flex-wrap: wrap;
    column-gap: 20px;
  }

  .my-card {
    background-color: #f0f7ff;
    margin-bottom: 20px;
    box-shadow: none;

    @media only screen and (min-width: 768px) {
      width: 48.5%;
    }

    a {
      text-decoration: none;
      color: #222222;
    }

    img {
      width: 100%;
      height: auto;
      border-radius: 5px;
      object-fit: cover;
      box-shadow: 7px 10px 15px -8px #949494;
    }

    .card-text {
      font-size: 20px;
    }

    .card-title {
      font-size: 16px;
      font-weight: bold;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-bottom: 0;
    }
  }
}
</style>
