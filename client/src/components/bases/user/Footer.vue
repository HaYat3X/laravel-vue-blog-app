<template>
  <q-footer elevated>
    <ul>
      <li>
        <a href="/about/me"> 私について </a>
      </li>

      <li>
        <a href="/about/blog"> ブログについて </a>
      </li>

      <li>
        <a href="/"> ブログ </a>
      </li>

      <li>
        <a href="/contact/submit"> お問い合わせ </a>
      </li>

      <li>
        <a href="/privacy-policy"> プライバシーポリシー </a>
      </li>
    </ul>

    <hr />

    <p style="margin-bottom: 0">&copy; 2023-2024 Hayate Takeda</p>
  </q-footer>
</template>

<style scoped lang="scss">
.q-footer {
  background-color: #212529;
  padding: 30px 0;

  ul {
    padding: 0 20px;
    list-style: none;
    text-align: center;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      display: flex;
      list-style: none;
      gap: 20px;
      justify-content: center;
    }

    @media only screen and (min-width: 1024px) {
      display: flex;
      list-style: none;
      gap: 20px;
      justify-content: center;
    }

    li {
      a {
        color: #ffffff;
        text-decoration: none;
      }
    }
  }

  p {
    text-align: center;
    color: #ffffff;
    font-size: 14px;
  }

  hr {
    border-top: 0.5px solid #cad4dc;
    width: 90%;
    margin: 20px auto;
    max-width: 1200px;
  }
}
</style>
