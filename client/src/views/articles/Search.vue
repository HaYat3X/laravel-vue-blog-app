<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue'
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import type { Article } from '@/types/article'
import { getData } from '@/services/api'
import { useHead } from '@unhead/vue'

useHead({
  title: '記事を検索',
  meta: [
    {
      name: 'discription',
      content:
        '最新の記事や関連する情報を検索してみてください。様々なトピックに関する情報が見つかるかもしれません。'
    }
  ]
})

const keyword = ref('')
const router = useRouter()
const articles = ref<Article[]>([])

onMounted(async () => {
  const url = `/article/post/public?page=${1}`
  const getPublishedArticle = await getData(url)

  // サーバー内でエラーが発生した場合、500ページにリダイレクトする
  if (getPublishedArticle.error) {
    router.push('/server-error')
  }

  articles.value = getPublishedArticle.articles.data
})

/**
 * 検索されたキーワードを検索結果画面へ送信する
 */
const onSubmit = () => {
  if (keyword.value) {
    router.push({ path: '/search/result', query: { keyword: keyword.value } })
  }
}
</script>

<template>
  <NoSidebarLayout>
    <div class="search-area">
      <h2>SearchArticle</h2>

      <q-form @submit="onSubmit">
        <q-input
          filled
          v-model="keyword"
          label="キーワードを入力"
          lazy-rules
          :rules="[(val) => (val && val.length > 0) || 'キーワードを入力してください。']"
        >
          <!-- <template v-slot:prepend>
            <q-icon name="search" />
          </template> -->

          <template v-slot:append>
            <q-icon
              v-if="keyword !== ''"
              name="close"
              @click="keyword = ''"
              class="cursor-pointer"
            />
          </template>

          <template v-slot:hint> Enterキーで検索 </template>
        </q-input>
      </q-form>
    </div>

    <div class="recent-articles">
      <p>Recent Article</p>

      <div class="article">
        <q-card class="my-card" v-for="article in articles.slice(0, 3)" :key="article.id">
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
    </div>
  </NoSidebarLayout>
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

.recent-articles {
  margin-top: 30px;

  .article {
    @media only screen and (min-width: 768px) {
      display: flex;
      flex-wrap: wrap;
      column-gap: 20px;
    }
  }

  p {
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
  }

  .my-card {
    background-color: #f0f7ff;
    margin-bottom: 20px;
    box-shadow: none;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      width: 48.5%;
    }

    @media only screen and (min-width: 1024px) {
      width: 32.05%;
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
