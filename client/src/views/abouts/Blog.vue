<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue'
import { useHead } from '@unhead/vue'

useHead({
  title: '「Hayate Tech Lab」について',
  meta: [
    {
      name: 'discription',
      content: '「Hayate Tech Lab」の開設に至った経緯や技術仕様をご紹介致します。'
    }
  ]
})
</script>

<template>
  <NoSidebarLayout>
    <div class="about-blog">
      <h2>1. ブログの概要</h2>

      <p>[Hayate Tech Lab]（以下「当ブログ」とします）は専門学校に通いながら、プライベートの時間で作成したブログです。</p>

      <p>
        2024年の3月に公開しました。
        <br />今後も定期的にメンテナンスを実施し、当ブログを運用していく予定です。
      </p>

      <p>このページでは当サイトの目的と技術仕様についてまとめています。</p>

      <h2>2. ブログの目的</h2>

      <ul>
        <li>日々の学習記録</li>
        <li>実装した技術や使用した技術の記録と共有</li>
      </ul>

      <p>
        もともとは就職活動用のポートフォリオとして作成したものですが、その役割を終え、現在は日々学んだことの記録が主な目的です。
      </p>

      <h2>3. ドキュメント</h2>

      <ul>
        <li>
          <a
            target="_blank"
            href="https://drive.google.com/drive/folders/1BHxJVzMoHS33fSvYP4z38tI7lflqTVMI"
          >
            要件定義関連のドキュメント
          </a>
        </li>

        <li>
          <a
            target="_blank"
            href="https://drive.google.com/drive/folders/1JwoBEoxcD2btSq9ksoTYolIzO04Ubgpy"
          >
            基本設計関連のドキュメント
          </a>
        </li>

        <li>
          <a
            target="_blank"
            href="https://drive.google.com/drive/folders/1_7UE0r_VSMDlDaYLww5pUKFtxkAxwKA7"
          >
            詳細設計関連のドキュメント
          </a>
        </li>
      </ul>

      <p>
        当ブログはプログラミングだけでなく、要件定義、基本設計、詳細設計などの設計部分もドキュメントを作成し、実施しています。よろしければご覧ください。
      </p>

      <h2>4. 技術仕様</h2>

      <ul>
        <li>
          Webアプリ部分（クライアントサイド）
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

        <li>
          Webアプリ部分（サーバーサイド）
          <ul>
            <li>Laravel</li>
            <li>MySQL</li>
            <li>PHP</li>
            <li>sanctum</li>
          </ul>
        </li>

        <li>
          CI/CD / インフラ部分
          <ul>
            <li>
              ロリポップマネージドクラウド（VPSサーバーにLaravelをインストールし、運用しています。）
            </li>
            <li>Vercel</li>
          </ul>
        </li>

        <li>
          その他利用ツール
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

      <img src="../../assets/img/technical-specifications.png" alt="" />
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.about-blog {
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
