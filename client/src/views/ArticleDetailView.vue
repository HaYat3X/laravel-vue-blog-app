<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue';
import { marked } from "marked"
import { onMounted, ref } from 'vue';

const markdownContent = `
  ## ターゲット

  Neovim には Lua が組込まれており、設定ファイル(init.lua) やプラグインを Lua で書けます。
  しかし Lua の言語機能はなかなか貧弱であり、LSP のサポートがないと体験は悪いです。
  ですので sumneko 氏が開発しているこちらの Language server(以下 \`LuaLS\` と表記) を入れている方は多いでしょう。

  https://github.com/LuaLS/lua-language-server

  今回は LuaLS をちゃんと設定し、\`vim.api\` やプラグインの補完などをバリバリ効くようにして快適にしていきます。

  この記事の目的は LuaLS をいい感じに設定することだけです。
  nvim-lspconfig や mason.nvim などには触れません。

  ## 参考元

  公式のドキュメントはこちら。

  https://luals.github.io/wiki/

  ## 型の付け方

  LuaLS に型情報を伝えるには Annotations と呼ばれるコメント記法を使います。
  ここを見てください。

  https://luals.github.io/wiki/annotations/

  ## 設定方法

  LuaLS の設定はここに一覧があります。
  [リンクテキスト](https://luals.github.io/wiki/annotations/){:target="_blank"}

  https://luals.github.io/wiki/settings/

  StyLua を使うから LuaLS の formatter は無効にしたい、だとか semantic highlight 要らないから切りたい、などの設定ができます。

  そして今回の肝になるのは \`workspace.library\` です。

  ## lazy.nvim の場合

  先にコードを載せます。

  \`\`\`lua
  local lspconfig = require("lspconfig")

  -- 以降のコードは省略
  \`\`\`

  ## サンプルコード

  TypeScriptでのサンプルコードを以下に追加します。
  <p><a href="https://sample.com/" target="_blank">アンカーテキスト</a></p>

  \`\`\`
  # test.ts
  /**
   * 公開記事一覧を取得するためのAPIにリクエストを送信します。
   * @param {number} page - 取得するページ番号
   * @returns {Promise<Object>} APIからのレスポンス
   * @throws {Error} レスポンスが正常でない場合やAPIリクエスト中にエラーが発生した場合
   */
  export async function getPublishedArticle(page: number) {
    try {
      const apiUrl = 'http://127.0.0.1:8000/api/article/get_published_article?page=$';

      const response = await fetch(apiUrl, {
        headers: {
          'Content-Type': 'application/json',
        },
      });

      if (!response.ok) {
        return { error: { message: 'APIリクエストが失敗しました。 $' } };
      }

      return await response.json();
    } catch (error) {
      return { error: { message: 'APIリクエスト中にエラーが発生しました。' } };
    }
  }
  \`\`\`

  get_plugin_paths()はプラグインマネージャーによって実装が変わります。
  筆者は lazy.nvim を使っています。

  ## テーブル
  | 列1のヘッダ | 列2のヘッダ | 列3のヘッダ |
|-------------|-------------|-------------|
| データ1      | データ2      | データ3      |
| データ4      | データ5      | データ6      |
| データ7      | データ8      | データ9      |

  ## 引用
  > これは引用の例です。何か重要な情報や興味深い引用をここに書くことができます。
  > 引用文は段落をまたいでも機能します

  ## 画像
  ![子猫の画像](https://user0514.cdnw.net/shared/img/thumb/shikun20220402_114719-2_TP_V.jpg)
`;

const markdown2 = marked(markdownContent);

onMounted(async () => {

});
</script>

<template>
  <WithSidebarLayout>
    <div class="content-container">
      <div class="thumbnail-area">
        <h2>RustでWebバックエンドを書き始めてから1年くらい経った</h2>
        <small>2022-03-22に公開</small>
      </div>

      <div class="article">
        <div class="tag">
          <a href="/">
            <label for=""># Laravel</label>
          </a>
          <a href="/">
            <label for=""># Laravel</label>
          </a>
          <a href="/">
            <label for=""># Laravel</label>
          </a>

          <a href="/">
            <label for=""># Laravel</label>
          </a>

          <a href="/">
            <label for=""># Laravel</label>
          </a>

          <a href="/">
            <label for=""># Laravel</label>
          </a>
        </div>

        <div class="content" v-html="markdown2"></div>
      </div>
    </div>
  </WithSidebarLayout>
</template>

<style lang="scss">
.content-container {
  .thumbnail-area {
    text-align: center;
    padding: 20px 40px 60px;

    h2 {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    small {
      font-size: 14px;
    }
  }

  .article {
    background-color: #ffffff;
    border-radius: 5px;
    padding: 25px;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      padding: 30px;
    }

    @media only screen and (min-width: 1024px) {
      padding: 40px;
    }

    .tag {
      display: flex;
      column-gap: 5px;
      row-gap: 15px;
      flex-wrap: wrap;

      a {
        text-decoration: none;
      }

      label {
        background-color: #3ea8ff;
        color: #ffffff;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 50px;
        cursor: pointer;
      }
    }

    .content {
      h2 {
        margin-top: 45px;
        margin-bottom: 10px;
        font-size: 22px;
        font-weight: bold;
      }

      h3 {
        margin-top: 30px;
        margin-bottom: 10px;
        font-size: 19px;
        font-weight: bold;
      }

      p {
        font-size: 16px;
        line-height: 1.5;
      }

      ul {
        list-style-type: none;
        padding: 0;
      }

      li {
        margin-bottom: 5px;
        padding-left: 25px;
        position: relative;
      }

      li::before {
        content: "•";
        color: gray;
        font-size: 28px;
        position: absolute;
        left: 5px;
        top: -10px;
      }

      pre {
        margin: 10px 0;
        padding: 15px;
        border: solid 1px #eaedf2;
        border-radius: 5px;
        background: #f3f6fc;
        color: #54687c;
        border-radius: 5px;
        overflow-x: auto;

        code {
          font-family: Menlo, Consolas, 'DejaVu Sans Mono', monospace;
          line-height: 1.6;
        }
      }

      img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 5px;
      }

      blockquote {
        border-left: 3px solid gray;
        padding: 10px;
      }

      table {
        border-collapse: collapse;
        width: 100%;
        border-radius: 5px;
        overflow: hidden;
      }

      th,
      td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }

      th {
        background-color: #f7f7f7;
      }

      a {
        color: #3ea8ff;
        text-decoration: none;
      }

      a:hover {
        text-decoration: underline;
      }
    }
  }
}
</style>