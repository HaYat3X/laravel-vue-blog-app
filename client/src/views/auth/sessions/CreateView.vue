<script setup lang="ts">
import { onMounted } from 'vue'
import { Field, Form, ErrorMessage } from 'vee-validate'
import * as yup from 'yup'
import { RouterLink, useRouter } from 'vue-router'
import NoSidebarLayout from '@/components/layouts/admin/NoSidebarLayout.vue'

const router = useRouter()

onMounted(async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/session', {
      headers: {
        'Content-Type': 'application/json',
        Authorization: `Bearer ${localStorage.getItem('authToken')}`
      }
    })

    if (response.ok) {
      const responseData = await response.json()
      console.log('すでログインしている。', responseData.admin.name)
      // ログインしている場合、ダッシュボードなどへリダイレクト
      router.push('/dashboard')
    }
  } catch (error) {
    console.error('ログイン状態の判定エラー:', error)
  }
})

const schema = yup.object({
  email: yup
    .string()
    .email('Please enter a valid email address.')
    .required('Please enter your email address.'),
  password: yup.string().required('Please enter your password.')
})

const handleSubmit = async (values: any) => {
  try {
    const data = {
      email: values.email,
      password: values.password
    }

    const response = await fetch('http://127.0.0.1:8000/api/session', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`)
    }

    const responseData = await response.json()
    localStorage.setItem('authToken', responseData.token)
    router.push('/dashboard')
    // ローカルストレージにトークンを保存
    console.log('POSTが成功しました。レスポンスデータ:', responseData.token)
  } catch (error) {
    console.error('POSTリクエストエラー:', error)
  }
}
</script>

<template>
  <NoSidebarLayout>
    <div class="login-area">
      <div class="login-container">
        <h2>Welcome to Your Dashboard</h2>
        <h5>Please sign in</h5>

        <Form :validation-schema="schema" @submit="handleSubmit">
          <div class="form-group">
            <Field name="email" type="email" placeholder="Email" />

            <p class="error-msg">
              <ErrorMessage name="email" />
            </p>
          </div>

          <div class="form-group">
            <Field name="password" type="password" placeholder="Password" />

            <p class="error-msg">
              <ErrorMessage name="password" />
            </p>
          </div>

          <button>Submit</button>
        </Form>
      </div>
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.login-area {
  width: 1200px;
  margin: 0 auto;
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
