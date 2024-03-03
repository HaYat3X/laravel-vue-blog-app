<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue'
import { marked } from 'marked'
import { onMounted, ref } from 'vue'
import type { Article } from '@/types/article'
import { useRouter } from 'vue-router'
import { getData } from '@/services/api'
import PreviewMarkdown from '@/components/elements/PreviewMarkdown.vue'
import { useHead } from '@unhead/vue'

const router = useRouter()
const article = ref<Article>()
const markdownContent = ref()

onMounted(async () => {
  const slug = router.currentRoute.value.params.slug
  const url = `/article/post/${slug}`
  const getArticle = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (getArticle.internalServerError) {
    router.push('/server-error')
  }

  // ページが見つからない場合は、404ページにリダイレクトする
  if (getArticle.notFoundError) {
    router.push({ name: 'NotFound' })
  }

  article.value = getArticle.article
  markdownContent.value = marked(article.value?.content)

  useHead({
    title: getArticle.article.meta_title,
    meta: [
      {
        name: 'discription',
        content: getArticle.article.meta_description
      }
    ]
  })
})
</script>

<template>
  <WithSidebarLayout>
    <div class="content-container">
      <div class="article">
        <div class="thumbnail-area">
          <h1>{{ article?.title }}</h1>
          <small>{{ article?.created_at.slice(0, 10) }}に公開</small>
        </div>

        <PreviewMarkdown :markdown-content="markdownContent" />
      </div>
    </div>
  </WithSidebarLayout>
</template>

<style lang="scss">
.content-container {
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

    .thumbnail-area {
      text-align: center;

      h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
      }

      small {
        background-color: #3ea8ff;
        border-radius: 50px;
        padding: 2px 10px;
        font-size: 13px;
        color: #ffffff;
      }
    }
  }
}
</style>
