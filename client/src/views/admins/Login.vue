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
const isPwd = ref(true)

const onSubmit = async () => {
  const url = `/session/login`
  const formData = new FormData()
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
    <div class="container">
      <h2>Welcome to Your Dashboard</h2>
      <h5>Please sign in</h5>

      <q-form @submit="onSubmit" class="q-gutter-md">
        <q-input
          filled
          v-model="email"
          label="Email"
          :rules="[
            (val) => (val && val.length > 0) || 'Please enter your email address.',
            (val) =>
              /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(val) ||
              'Please enter a valid email address.'
          ]"
          class="md-filled"
        >
          <template v-slot:prepend>
            <q-icon name="email" />
          </template>
        </q-input>

        <q-input
          v-model="password"
          filled
          label="Password"
          :type="isPwd ? 'password' : 'text'"
          :rules="[(val) => (val && val.length > 0) || 'Please enter your password.']"
        >
          <template v-slot:append>
            <q-icon
              :name="isPwd ? 'visibility_off' : 'visibility'"
              class="cursor-pointer"
              @click="isPwd = !isPwd"
            />
          </template>

          <template v-slot:prepend>
            <q-icon name="lock" />
          </template>
        </q-input>

        <q-btn label="login" type="submit" />
      </q-form>
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.container {
  max-width: 400px;
  margin: 0 auto;

  h2 {
    text-align: center;
    color: #222222;
    font-weight: 700;
    font-size: 24px;
    line-height: 1.3;
  }

  h5 {
    text-align: center;
    color: #333333;
    font-size: 18px;
    margin-top: 5px;
    font-weight: 400;
    line-height: 1;
    margin-bottom: 80px;
  }

  .q-btn {
    background-color: #3ea8ff;
    color: #ffffff;
  }
}
</style>
