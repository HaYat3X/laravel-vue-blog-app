<script setup lang="ts">
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'
import WithSidebarLayout from '@/components/layouts/admin/WithSidebarLayout.vue'
import { isLogin } from '@/apis/auth/session'

const router = useRouter()

onMounted(async () => {
  const response = await isLogin()

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  // ログインに失敗した場合も500ページに飛ばしているのはよくないので修正を！
  if (response.internalServerError) {
    router.push('/error')
  }
})
</script>

<template>
  <with-sidebar-layout>
    <div class="content-area">
      <div class="content-container">
        <div class="blogs">
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
            <path
              d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z"
            />
          </svg>

          <h2>Blogs</h2>
        </div>

        <div class="tags">
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
            <path
              d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"
            />
          </svg>

          <h2>Tags</h2>
        </div>

        <div class="contacts">
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
            <path
              d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z"
            />
          </svg>

          <h2>Contacts</h2>
        </div>
      </div>
    </div>
  </with-sidebar-layout>
</template>

<style scoped lang="scss">
.content-area {
  width: calc(100% - 250px);
  padding: 40px 80px;

  .content-container {
    display: flex;
    gap: 20px;

    .blogs {
      width: 33.33%;
      background-color: #0284c7;
      border-radius: 5px;
      padding: 36px 26px;
      text-align: center;

      svg {
        fill: #ffffff;
        width: 55px;
        height: 55px;
        margin-right: 8px;
      }

      h2 {
        font-size: 20px;
        font-weight: bold;
        color: #ffffff;
        margin-top: 10px;
      }
    }

    .tags {
      width: 33.33%;
      background-color: #0891b2;
      border-radius: 5px;
      padding: 36px 26px;
      text-align: center;

      svg {
        fill: #ffffff;
        width: 55px;
        height: 55px;
        margin-right: 8px;
      }

      h2 {
        font-size: 20px;
        font-weight: bold;
        color: #ffffff;
        margin-top: 10px;
      }
    }

    .contacts {
      width: 33.33%;
      background-color: #65a30d;
      border-radius: 5px;
      padding: 36px 26px;
      text-align: center;

      svg {
        fill: #ffffff;
        width: 55px;
        height: 55px;
        margin-right: 8px;
      }

      h2 {
        font-size: 20px;
        font-weight: bold;
        color: #ffffff;
        margin-top: 10px;
      }
    }
  }
}
</style>
