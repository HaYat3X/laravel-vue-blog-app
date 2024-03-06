<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue'
import { useHead } from '@unhead/vue'

useHead({
  title: 'ページが見つかりません',
  meta: [
    {
      name: 'discription',
      content: '指定されたページ（URL）が見つかりません。'
    }
  ]
})
</script>

<template>
  <NoSidebarLayout>
    <div class="container">
      <h2>404</h2>
      <p>指定されたページ（URL）が見つかりません。</p>

      <q-btn to="/" label="トップページへ戻る" />
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.container {
  text-align: center;
  margin: 0 auto;

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

  .q-btn {
    background-color: #3ea8ff;
    color: #ffffff;
  }
}
</style>
