<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue'
import { useHead } from '@unhead/vue'

useHead({
  title: 'プライバシーポリシー',
  meta: [
    {
      name: 'discription',
      content:
        '当サイトのプライバシーポリシーには、個人情報の収集・利用に関する情報が記載されています。ご利用前にお読みいただき、当サイトがどのように個人情報を取り扱っているかをご理解ください。'
    }
  ]
})
</script>

<template>
  <NoSidebarLayout>
    <div class="privacy-policy">
      <h2>1. プライバシーポリシー</h2>

      <p>
        このプライバシーポリシーは、[Hayate Tech
        Lab]（以下「当ブログ」とします）の利用に関する個人情報の収集、使用、および保護についての方針を示しています。
      </p>

      <h2>2. 収集する情報</h2>

      <p>
        当ブログでは、お問い合わせフォームを通じて、名前やメールアドレスなどの個人情報を収集する場合があります。これらの情報は、お問い合わせに対する回答やサービスの提供のために利用されます。
      </p>

      <h2>3. 情報の使用</h2>

      <ul>
        <li>お問い合わせに対する回答</li>
        <li>サービスの提供や情報の配信</li>
        <li>当ブログの運営や改善に関する連絡</li>
      </ul>

      <p>収集された個人情報は、上記の目的のために使用される場合があります。</p>

      <h2>4. 情報の保護</h2>

      <p>
        当ブログは、収集された個人情報を適切に保護し、第三者に提供することはありません。また、情報の紛失、不正アクセス、改ざん、漏洩などを防ぐための適切な措置を講じます。
      </p>

      <h2>5. お問い合わせ先</h2>

      <p style="margin-bottom: 0;">
        プライバシーポリシーに関するご質問がございましたら、以下のメールアドレスまでお気軽にご連絡ください。<br />
        E-mail: <a href="mailto:hayatetakeda48@gmail.com">hayatetakeda48@gmail.com</a>
      </p>
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.privacy-policy {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 5px;

  @media only screen and (min-width: 768px) {
    padding: 50px;
    max-width: 900px;
    margin: 0 auto;
  }

  h2 {
    font-size: 26px;
    font-weight: bold;
    line-height: 1.5;
  }

  ul {
    margin-bottom: 15px;
  }

  li {
    padding: 5px;
  }

  p {
    font-size: 15px;
    margin-bottom: 30px;
  }

  img {
    width: 100%;
    border-radius: 5px;
    height: auto;
    object-fit: cover;
  }
}
</style>
