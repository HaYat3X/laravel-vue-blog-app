<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue'
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
    <div class="container">
      <h2>お問い合わせ完了</h2>

      <p>
        お問合せいただきありがとうございます。<br />
        近日中にご連絡しますので、恐れ入りますがしばらくお待ちください。
      </p>

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

    @media only screen and (min-width: 768px) {
      font-size: 32px;
    }
  }

  p {
    margin-top: 10px;
  }

  .q-btn {
    background-color: #3ea8ff;
    color: #ffffff;
  }
}
</style>
