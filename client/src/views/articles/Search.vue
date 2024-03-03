<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue';
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import type { Article } from '@/types/article'
import { getData } from '@/services/api';
import { useHead } from '@unhead/vue'

useHead({
  title: '記事を検索',
  meta: [
    {
      name: 'discription',
      content: '最新の記事や関連する情報を検索してみてください。様々なトピックに関する情報が見つかるかもしれません。'
    }
  ]
})

const keyword = ref('');
const router = useRouter();
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
const onsubmit = () => {
  router.push({ path: '/search/result', query: { keyword: keyword.value } });
}
</script>

<template>
  <NoSidebarLayout>
    <div class="search-area">
      <form class="search-form-6" @submit.prevent="onsubmit">
        <label>
          <input type="text" v-model="keyword" placeholder="キーワードを入力..." required>
        </label>
      </form>
    </div>

    <div class="recent-articles">
      <h2>Recent Articles</h2>

      <div class="articles">
        <div class="card" v-for="(article, index) in articles.slice(0, 3)" :key="article.id">
          <a :href="`/${article.slug}`">
            <div class="card-img">
              <!-- <img :src="`http://127.0.0.1:8000/storage/featured_image/${article.featured_image}`" alt=""> -->
              <img :src="`https://x162-43-70-220.static.shin-vps.jp/storage/featured_image/${article.featured_image}`" alt="">
            </div>

            <p>
              {{ article.title }}
            </p>

            <small>
              {{ article.created_at.slice(0, 10) }}
            </small>
          </a>
        </div>
      </div>
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.search-area {
  .search-form-6 {
    display: flex;
    align-items: center;
    overflow: hidden;
    border: 1px solid #dfe1e5;
    border-radius: 24px;
    background-color: #ffffff;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      border-radius: 35px;
    }

    @media only screen and (min-width: 1024px) {
      border-radius: 35px;
    }

    &:hover {
      box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
      border: 1px solid #3ea8ff;
    }

    &::before {
      width: 45px;
      height: 16px;
      background-image: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%20%3Cpath%20d%3D%22M23.7%2020.8%2019%2016.1c-.2-.2-.5-.3-.8-.3h-.8c1.3-1.7%202-3.7%202-6C19.5%204.4%2015.1%200%209.7%200S0%204.4%200%209.7s4.4%209.7%209.7%209.7c2.3%200%204.3-.8%206-2v.8c0%20.3.1.6.3.8l4.7%204.7c.4.4%201.2.4%201.6%200l1.3-1.3c.5-.5.5-1.2.1-1.6zm-14-5.1c-3.3%200-6-2.7-6-6s2.7-6%206-6%206%202.7%206%206-2.6%206-6%206z%22%20fill%3D%22%239aa0a6%22%3E%3C%2Fpath%3E%20%3C%2Fsvg%3E');
      background-position: center;
      background-repeat: no-repeat;
      content: '';
    }

    input {
      height: 45px;
      padding: 20px 0;
      font-size: 16px;
      border: none;
      box-sizing: border-box;
      outline: none;
      background-color: #ffffff;

      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        height: 55px;
      }

      @media only screen and (min-width: 1024px) {
        height: 55px;
      }
    }
  }
}

.recent-articles {
  margin-top: 50px;

  h2 {
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 5px;
  }

  .articles {
    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      display: flex;
      gap: 20px;
    }

    @media only screen and (min-width: 1024px) {
      display: flex;
      gap: 20px;
    }

    .card {
      margin-bottom: 30px;

      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        width: 33.33%;
      }

      @media only screen and (min-width: 1024px) {
        width: 33.33%;
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
        transition: opacity 0.3s;

        &:hover {
          opacity: 0.5;
        }
      }

      p {
        font-size: 16px;
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
    }
  }
}
</style>