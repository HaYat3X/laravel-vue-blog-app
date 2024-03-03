<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue'
import { useHead } from '@unhead/vue'

useHead({
  title: '問題が発生しました',
  meta: [
    {
      name: 'discription',
      content: '一時的にアクセスできない状態です。時間を置いて再度お試しください。'
    }
  ]
})
</script>

<template>
  <NoSidebarLayout>
    <div class="not-found">
      <h2>500</h2>
      <h3>問題が発生しました。</h3>

      <p>
        一時的にアクセスできない状態です。<br />
        時間を置いて再度お試しください。
      </p>
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.not-found {
  text-align: center;
  margin: 0 auto;

  h2 {
    font-weight: bold;
    font-size: 100px;
    color: #545454;
    margin-bottom: 20px;
  }

  h3 {
    font-weight: bold;
    font-size: 24px;
    color: #333333;
  }

  p {
    margin: 10px 0;
  }
}
</style>
