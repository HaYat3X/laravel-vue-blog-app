<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/NoSidebarLayout.vue';
</script>

<template>
  <NoSidebarLayout>
    <div class="about-blog">
      <h2>1. ブログの概要</h2>

      <p class="mb">
        このブログは専門学校に通いながら、プライベートの時間で作成したブログです。
      </p>

      <p class="mb">
        2024年の3月に公開しました。
        <br>今後も定期的にメンテナンスを実施し、当ブログを運用していく予定です。
      </p>

      <p>
        このページでは当サイトの目的と技術仕様についてまとめています。
      </p>

      <h2 class="h2-mb">2. ブログの目的</h2>

      <ul class="mb">
        <li>日々の学習記録</li>
        <li>実装した技術や使用した技術の記録と共有</li>
      </ul>

      <p>
        もともとは就職活動用のポートフォリオとして作成したものですが、その役割を終え、現在は日々学んだことの記録が主な目的です。
      </p>

      <h2 class="h2-mb">3. ドキュメント</h2>

      <p class="mb">
        当ブログはプログラミングだけでなく、要件定義、基本設計、詳細設計などの設計部分も実施しています。
      </p>

      <ul class="mb">
        <li>
          <a target="_blank" href="https://drive.google.com/drive/folders/1BHxJVzMoHS33fSvYP4z38tI7lflqTVMI">
            要件定義関連のドキュメント
          </a>
        </li>

        <li>
          <a target="_blank" href="https://drive.google.com/drive/folders/1JwoBEoxcD2btSq9ksoTYolIzO04Ubgpy">
            基本設計関連のドキュメント
          </a>
        </li>

        <li>
          <a target="_blank" href="https://drive.google.com/drive/folders/1_7UE0r_VSMDlDaYLww5pUKFtxkAxwKA7">
            詳細設計関連のドキュメント
          </a>
        </li>
      </ul>

      <h2 class="h2-mb">4. 技術仕様</h2>

      <ul class="mb">
        <li>Webアプリ部分（クライアントサイド）
          <ul>
            <li>Vue.js</li>
            <li>HTML</li>
            <li>CSS</li>
            <li>TypeScript</li>
            <li>fetchAPI</li>
            <li>vue-router</li>
            <li>vue-chartjs</li>
            <li>FontAwesome</li>
          </ul>
        </li>

        <li>Webアプリ部分（サーバーサイド）
          <ul>
            <li>Laravel</li>
            <li>MySQL</li>
            <li>PHP</li>
            <li>sanctum</li>
          </ul>
        </li>

        <li>CI/CD / インフラ部分
          <ul>
            <li>ロリポップマネージドクラウド（VPSサーバーにLaravelをインストールし、運用しています。）</li>
            <li>Vercel</li>
          </ul>
        </li>

        <li>その他利用ツール
          <ul>
            <li>MAMP / XAMPP</li>
            <li>Vite</li>
            <li>postman</li>
            <li>Git / GitHub</li>
            <li>canva</li>
            <li>Excel / Word / diagrams.net</li>
          </ul>
        </li>
      </ul>

      <img src="../assets/img/technical-specifications.png" alt="">
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