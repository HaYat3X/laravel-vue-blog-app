<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/user/WithSidebarLayout.vue'
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { createData } from '@/services/api'
import { useHead } from '@unhead/vue'

useHead({
  title: 'お問い合わせ',
  meta: [
    {
      name: 'discription',
      content:
        'お問い合わせフォームから、ご質問やご意見をお送りください。お客様のご意見をお聞かせいただき、より良いサービスを提供できるよう努めています。'
    }
  ]
})

const name = ref('')
const email = ref('')
const category = ref('')
const content = ref('')
const router = useRouter()
const options = [
  '技術関連の質問',
  '当ブログへのフィードバック',
  'コラボレーションや提携のご依頼',
  'エンジニアリングに関連する仕事やプロジェクトのご相談',
  'その他のお問い合わせ'
]

const onSubmit = async () => {
  const url = `/contact`
  const formData = new FormData()
  formData.append('name', name.value)
  formData.append('email', email.value)
  formData.append('category', category.value)
  formData.append('content', content.value)

  const submitContact = await createData(url, formData)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (submitContact.internalServerError) {
    router.push('/server-error')
  }

  // 何もエラーがない場合は、お問い合わせ完了画面へ遷移する
  router.push('/contact/complete')
}
</script>

<template>
  <WithSidebarLayout>
    <h2>Contact</h2>

    <q-form @submit="onSubmit" class="">
      <p>竹田 颯へのお問い合わせはこちらからお願い致します。</p>

      <q-input
        filled
        v-model="name"
        label="お名前"
        :rules="[(val) => (val && val.length > 0) || '名前を入力してください。']"
        class="md-filled"
      >
        <template v-slot:prepend>
          <q-icon name="person" />
        </template>
      </q-input>

      <q-input
        filled
        v-model="email"
        label="メールアドレス"
        :rules="[
          (val) => (val && val.length > 0) || 'メールアドレスを入力してください。',
          (val) =>
            /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(val) ||
            '有効なメールアドレスを入力してください。'
        ]"
        class="md-filled"
      >
        <template v-slot:prepend>
          <q-icon name="email" />
        </template>
      </q-input>

      <q-select
        filled
        v-model="category"
        :options="options"
        label="お問い合わせカテゴリー"
        :rules="[
          (val) =>
            (val !== null && val !== undefined && val !== '') || 'カテゴリーを選択してください。'
        ]"
        class="md-filled"
      >
        <template v-slot:prepend>
          <q-icon name="category" />
        </template>
      </q-select>

      <q-input
        v-model="content"
        filled
        type="textarea"
        label="お問い合わせ内容"
        :rules="[(val) => (val && val.length > 0) || 'お問い合わせ内容を入力してください。']"
        style="margin-bottom: 15px;"
      >
        <template v-slot:prepend>
          <q-icon name="edit" />
        </template>
      </q-input>

      <q-btn label="送信する" type="submit" />
    </q-form>
  </WithSidebarLayout>
</template>

<style scoped lang="scss">
h2 {
  font-weight: bold;
  font-size: 30px;
  color: #333333;
  line-height: 1;
  margin-bottom: 15px;

  @media only screen and (min-width: 768px) {
    font-size: 32px;
  }
}

@media only screen and (min-width: 768px) {
  .md-filled {
    width: 50%;
  }
}

.q-input {
  margin-bottom: 15px;
}

.q-select {
  margin-bottom: 15px;
}

.q-btn {
  background-color: #3ea8ff;
  color: #ffffff;
}
</style>
