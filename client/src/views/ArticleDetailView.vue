<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue';
import { marked } from "marked"
import { onMounted, ref } from 'vue';
import { getArticle } from '@/apis/article/posts'
import type { Article } from "@/types/article";
import type { Tag } from "@/types/tag";
import { useRouter } from 'vue-router';

const router = useRouter();
const article = ref<Article>();
const markdownContent = ref();
const tags = ref<Tag[]>();

onMounted(async () => {
  const slug = router.currentRoute.value.params.slug;
  const response = await getArticle(slug);

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (response.internalServerError) {
    console.log(response.internalServerError.message);
    router.push('/error');
  }

  // ページが見つからない場合は、404ページにリダイレクトする
  if (response.notFoundError) {
    console.log(response.notFoundError.message);
    router.push({ name: 'NotFound' });
  }

  article.value = response.article;
  tags.value = response.tags;
  markdownContent.value = marked(article.value?.content);
});
</script>

<template>
  <WithSidebarLayout>
    <div class="content-container">
      <div class="thumbnail-area">
        <h2>{{ article?.title }}</h2>
        <small>{{ article?.created_at.slice(0, 10) }}に公開</small>
      </div>

      <div class="article">
        <div class="tag">
          <a href="/" v-for="tag in tags" :key="tag.id">
            <label for="">{{ tag.tag }}</label>
          </a>
        </div>

        <div class="content" v-html="markdownContent"></div>
      </div>
    </div>
  </WithSidebarLayout>
</template>

<style lang="scss">
.content-container {
  .thumbnail-area {
    text-align: center;
    padding: 20px 40px 60px;

    h2 {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    small {
      font-size: 14px;
    }
  }

  .article {
    background-color: #ffffff;
    border-radius: 5px;
    padding: 25px;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      padding: 30px;
    }

    @media only screen and (min-width: 1024px) {
      padding: 40px;
    }

    .tag {
      display: flex;
      column-gap: 5px;
      row-gap: 15px;
      flex-wrap: wrap;

      a {
        text-decoration: none;
      }

      label {
        background-color: #3ea8ff;
        color: #ffffff;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 50px;
        cursor: pointer;
      }
    }

    .content {
      h2 {
        margin-top: 45px;
        margin-bottom: 10px;
        font-size: 22px;
        font-weight: bold;
      }

      h3 {
        margin-top: 30px;
        margin-bottom: 10px;
        font-size: 19px;
        font-weight: bold;
      }

      p {
        font-size: 16px;
        line-height: 1.5;
        word-break: break-all;
      }

      ul {
        list-style-type: none;
        padding: 0;
      }

      li {
        margin-bottom: 5px;
        padding-left: 25px;
        position: relative;
      }

      li::before {
        content: "•";
        color: gray;
        font-size: 28px;
        position: absolute;
        left: 5px;
        top: -10px;
      }

      pre {
        margin: 10px 0;
        padding: 15px;
        border: solid 1px #eaedf2;
        border-radius: 5px;
        background: #f3f6fc;
        color: #54687c;
        border-radius: 5px;
        overflow-x: auto;

        code {
          font-family: Menlo, Consolas, 'DejaVu Sans Mono', monospace;
          line-height: 1.6;
        }
      }

      img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 5px;
      }

      blockquote {
        border-left: 3px solid gray;
        padding: 10px;
      }

      table {
        border-collapse: collapse;
        width: 100%;
        border-radius: 5px;
        overflow: hidden;
      }

      th,
      td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #f7f7f7;
      }

      a {
        color: #3ea8ff;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }
    }
  }
}
</style>