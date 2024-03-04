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
    <div class="container">
      <h2>500</h2>
      <p>
        一時的にアクセスできない状態です。<br />
        時間を置いて再度お試しください。
      </p>
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

    @media only screen and (min-width: 768px) {
      font-size: 32px;
    }
  }
}
</style>
