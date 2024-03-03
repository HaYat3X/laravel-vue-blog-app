<script setup lang="ts">
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import NoSidebarLayout from '@/components/layouts/admin/NoSidebarLayout.vue'
import { createData } from '@/services/api'
import { useHead } from '@unhead/vue'

useHead({
  title: 'Admin Login'
})

const router = useRouter()
const email = ref('')
const password = ref('')

const onSubmit = async () => {
  const url = `/session/login`
  const formData = new FormData
  formData.append('email', email.value)
  formData.append('password', password.value)

  const login = await createData(url, formData)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  // ログイン失敗している場合も500ページに飛ばすのは良くないので、今後修正を！
  if (login.internalServerError) {
    router.push('/server-error')
  }

  // ローカルストレージにトークンを保存
  localStorage.setItem('authToken', login.token)
  router.push('/article')
}
</script>

<template>
  <NoSidebarLayout>
    <div class="login-area">
      <div class="login-container">
        <h2>Welcome to Your Dashboard</h2>
        <h5>Please sign in</h5>

        <form @submit.prevent="onSubmit">
          <div class="form-group">
            <input type="email" v-model="email" required placeholder="Email" />
          </div>

          <div class="form-group">
            <input type="password" v-model="password" required placeholder="Password" />
          </div>

          <button>Submit</button>
        </form>
      </div>
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.login-area {
  background-color: #31373d;
  height: 100vh;

  .login-container {
    padding: 50px 0;

    h2 {
      text-align: center;
      color: #e4e7ed;
      font-weight: 700;
      font-size: 24px;
    }

    h5 {
      text-align: center;
      color: #e4e7edbf;
      font-size: 18px;
      margin-top: 5px;
      font-weight: 400;
    }

    form {
      width: 360px;
      margin: 50px auto;

      .form-group {
        margin-bottom: 20px;

        input {
          width: 100%;
          padding: 17px 13px;
          background-color: #212529;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          color: #ffffff;

          &::placeholder {
            color: #e4e7edbf;
          }

          &:focus {
            outline: none;
            border: 1px solid #3ea8ff;
          }
        }

        .error-msg {
          color: #e76868;
          font-size: 14px;
        }
      }

      button {
        width: 100%;
        padding: 15px 0;
        font-size: 16px;
        font-weight: 700;
        border-radius: 5px;
        cursor: pointer;
        background-color: #3ea8ff;
        border: none;
        color: #ffffff;

        &:hover {
          background-color: #0f83fd;
        }
      }
    }
  }
}
</style>
