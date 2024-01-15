<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue';
import ArticleCard from '@/components/elements/ArticleCard.vue';
import Pagination from '@/components/elements/Pagination.vue';
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import { getPublishedArticleKeyword, getPublishedArticleTag } from '@/apis/article/search';
import { getPublishedArticle } from '@/apis/article/posts'
import type { Article } from "@/types/article";

const router = useRouter();
const searchResultTitle = ref();
const articles = ref<Article[]>([]);
const currentPage = ref(1);
const lastPage = ref();
const tag = router.currentRoute.value.query.tag;
const keyword = router.currentRoute.value.query.keyword;

/**
 * 指定されたページに基づいて公開記事一覧を取得する
 * @param {number} page
 */
const fetchArticles = async (page: number) => {
  const response = await getPublishedArticle(page);

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (response.error) {
    console.log(response.error.message);
    router.push('/error');
  }

  articles.value = response.articles.data;
  currentPage.value = response.articles.current_page;
  lastPage.value = response.articles.last_page;
};

onMounted(async () => {
  if (!tag && !keyword) {
    router.push('/search');
  } else if (keyword && !tag) {
    const response = await getPublishedArticleKeyword(keyword);

    // サーバーエラーが発生した場合、500ページにリダイレクトする
    if (response.internalServerError) {
      console.log(response.internalServerError.message);
      router.push('/error');
    }

    console.log(response)

    articles.value = response.articles.data;
    currentPage.value = response.articles.current_page;
    lastPage.value = response.articles.last_page;
    searchResultTitle.value = `${keyword} の検索結果`;
  } else if (tag && !keyword) {
    const response = await getPublishedArticleTag(tag);

    // サーバーエラーが発生した場合、500ページにリダイレクトする
    if (response.internalServerError) {
      console.log(response.internalServerError.message);
      router.push('/error');
    }

    articles.value = response.articles.data;
    currentPage.value = response.articles.current_page;
    lastPage.value = response.articles.last_page;
    searchResultTitle.value = `#${tag} の検索結果`;
  }
});

/**
 * 現在のページを変更し、そのページに応じて記事を取得する
 * @param {number} page 
 */
const changePage = (page: number) => {
  fetchArticles(page);
};
</script>

<template>
  <WithSidebarLayout>
    <div class="content-container">
      <h2>{{ searchResultTitle }}</h2>

      <div v-if="articles.length === 0">
        記事が見つかりませんでした。
      </div>
      
      <div v-else class="article">
        <ArticleCard v-for="article in articles" :key="article.id"
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
    font-size: 28px;
    color: #333333;
  }

  .article {
    margin-top: 20px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 1023px) {
  .content-container {
    h2 {
      font-size: 30px;
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
      font-size: 30px;
    }

    .article {
      display: flex;
      flex-wrap: wrap;
      column-gap: 20px;
    }
  }
}
</style>