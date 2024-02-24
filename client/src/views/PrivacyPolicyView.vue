<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/NoSidebarLayout.vue';
</script>

<template>
  <NoSidebarLayout>
    <div class="privacy-policy">
      <h2>1. プライバシーポリシー</h2>

      <p class="mb">
        このプライバシーポリシーは、[Hayate Tech Lab]（以下「当ブログ」とします）の利用に関する個人情報の収集、使用、および保護についての方針を示しています。
      </p>

      <h2 class="h2-mb">2. 収集する情報</h2>

      <p class="mb">
        当ブログでは、お問い合わせフォームを通じて、名前やメールアドレスなどの個人情報を収集する場合があります。これらの情報は、お問い合わせに対する回答やサービスの提供のために利用されます。
      </p>

      <h2 class="h2-mb">3. 情報の使用</h2>

      <p class="mb">
        収集された個人情報は、次の目的のために使用される場合があります。
      </p>

      <ul class="mb">
        <li>お問い合わせに対する回答</li>
        <li>サービスの提供や情報の配信</li>
        <li>当ブログの運営や改善に関する連絡</li>
      </ul>

      <h2 class="h2-mb">4. 情報の保護</h2>

      <p class="mb">
        当ブログは、収集された個人情報を適切に保護し、第三者に提供することはありません。また、情報の紛失、不正アクセス、改ざん、漏洩などを防ぐための適切な措置を講じます。
      </p>

      <h2 class="h2-mb">5. お問い合わせ先</h2>

      <p>
        プライバシーポリシーに関するご質問がございましたら、以下のメールアドレスまでお気軽にご連絡ください。<br>
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

  @media only screen and (min-width: 768px) and (max-width: 1023px) {
    padding: 50px;
    max-width: 900px;
    margin: 0 auto;
  }

  @media only screen and (min-width: 1024px) {
    max-width: 900px;
    margin: 0 auto;
    padding: 50px;
  }

  .mb {
    margin-bottom: 20px;
  }

  h2 {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .h2-mb {
    margin-top: 50px;
  }

  li {
    padding: 5px;
  }

  img {
    width: 100%;
    border-radius: 5px;
    height: auto;
    object-fit: cover;
  }
}
</style>