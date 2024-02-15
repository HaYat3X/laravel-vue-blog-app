<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/NoSidebarLayout.vue';
</script>

<template>
  <NoSidebarLayout>
    <div class="about-blog">
      <p class="mb">
        このブログは専門学校に通いながら、プライベートの時間で作成したブログです。
      </p>

      <p class="mb">
        2024年の2月に公開しました。
        <br>今後も定期的にメンテナンスを実施し、当ブログを運用していく予定です。
      </p>

      <p>
        このページでは当サイトの目的と技術仕様についてまとめています。
      </p>

      <h2>1. ブログの目的</h2>

      <ul class="mb">
        <li>日々の学習記録</li>
        <li>実装した技術や使用した技術の記録と共有</li>
      </ul>

      <p>
        もともとは就職活動用のポートフォリオ兼ブログとして作成したものですが、その役割を終え、現在は日々学んだことの記録が主な目的です。
      </p>

      <h2>2. 技術仕様</h2>

      <ul class="mb">
        <li>Webアプリ部分（クライアントサイド）
          <ul>
            <li>Vue.js</li>
            <li>HTML</li>
            <li>SCSS</li>
            <li>TypeScript</li>
            <li>fetchAPI</li>
            <li>vue-router</li>
            <li>vue-chartjs</li>
            <li>FontAwesome</li>
          </ul>
        </li>

        <li>Webアプリ部分（サーバーサイド）
          <ul>
            <li>Laravel10</li>
            <li>MySQL</li>
            <li>PHP</li>
            <li>sanctum（トークンベースの認証機能作成時に利用）</li>
          </ul>
        </li>

        <li>CI/CD / インフラ部分
          <ul>
            <li>Heroku</li>
            <li>HerokuPostgres</li>
            <li>Vercel</li>
          </ul>
        </li>

        <li>その他利用ツール
          <ul>
            <li>MAMP（Laravel、MySQL、PHPの実行環境として利用）</li>
            <li>Vite（Vue.jsの実行環境として利用）</li>
            <li>postman（Laravelで作成したAPIのテストツールとして利用）</li>
            <li>Git / GitHub（ソースコードの管理に利用）</li>
          </ul>
        </li>
      </ul>

      <img src="../assets/img/exsample.png" alt="">
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.about-blog {
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
    margin: 50px 0 10px;
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