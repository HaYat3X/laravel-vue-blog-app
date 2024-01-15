<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/NoSidebarLayout.vue';
import Button from '@/components/elements/Button.vue';
</script>

<template>
  <NoSidebarLayout>
    <div class="not-found">
      <h2>404</h2>
      <h3>ページが見つかりません。</h3>

      <p>
        指定されたページ（URL）が見つかりません。
      </p>

      <a href="/">
        <Button>
          トップページに戻る
        </Button>
      </a>
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