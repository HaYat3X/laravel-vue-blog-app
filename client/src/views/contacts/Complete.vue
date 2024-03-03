<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue';
import Button from '@/components/elements/Button.vue';
import { useHead } from '@unhead/vue'

useHead({
  title: 'お問い合わせ完了',
  meta: [
    {
      name: 'discription',
      content: 'お問い合わせが完了しました。ご質問やご質問やご意見を頂きありがとうございました。'
    }
  ]
})
</script>

<template>
  <NoSidebarLayout>
    <div class="not-found">
      <h3>お問い合わせが完了しました。</h3>

      <p>
        お問合せいただきありがとうございます。<br>
        近日中にご連絡しますので、恐れ入りますがしばらくお待ちください。
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