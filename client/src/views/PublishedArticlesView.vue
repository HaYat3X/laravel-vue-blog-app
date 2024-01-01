<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue';
import ArticleCard from '@/components/elements/ArticleCard.vue';
import Pagination from '@/components/elements/Pagination.vue';
</script>

<template>
  <WithSidebarLayout>
    <div class="content-container">
      <h2>Articles</h2>

      <div class="article">
        <ArticleCard -featured-imgae="/src/assets/img/exsample.png" -article-title="RailsとNuxtでブログアプリを作成してみた。あああああああああ"
          -article-created-at="2024-01-01" />
        <ArticleCard -featured-imgae="/src/assets/img/exsample.png" -article-title="RailsとNuxtでブログアプリを作成してみた。あああああああああ"
          -article-created-at="2024-01-01" />
        <ArticleCard -featured-imgae="/src/assets/img/exsample.png" -article-title="RailsとNuxtでブログアプリを作成してみた。あああああああああ"
          -article-created-at="2024-01-01" />
        <ArticleCard -featured-imgae="/src/assets/img/exsample.png" -article-title="RailsとNuxtでブログアプリを作成してみた。あああああああああ"
          -article-created-at="2024-01-01" />
        <ArticleCard -featured-imgae="/src/assets/img/exsample.png" -article-title="RailsとNuxtでブログアプリを作成してみた。あああああああああ"
          -article-created-at="2024-01-01" />
        <ArticleCard -featured-imgae="/src/assets/img/exsample.png" -article-title="RailsとNuxtでブログアプリを作成してみた。あああああああああ"
          -article-created-at="2024-01-01" />
        <ArticleCard -featured-imgae="/src/assets/img/exsample.png" -article-title="RailsとNuxtでブログアプリを作成してみた。あああああああああ"
          -article-created-at="2024-01-01" />
      </div>

      <Pagination />
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
}</style>