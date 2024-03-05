<script setup lang="ts">
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { ref, watch } from 'vue'
import WithSidebarLayout from '@/components/layouts/admin/WithSidebarLayout.vue'
import { getData, updateData } from '@/services/api'
import { marked } from 'marked'
import PreviewMarkdown from '@/components/elements/PreviewMarkdown.vue'
import { useHead } from '@unhead/vue'

useHead({
  title: 'Edit Article'
})

const adminId = ref('')
const title = ref('')
const content = ref('')
const metaDescription = ref('')
const publicStatus = ref<Boolean>()
const router = useRouter()
const articleId = router.currentRoute.value.params.articleId
const markdownContent = ref()

onMounted(async () => {
  const url1 = `/session/user`
  const user = await getData(url1)

  adminId.value = user.admin.id

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (user.internalServerError) {
    router.push('/server-error')
  }

  // 編集する記事を取得
  const url2 = `/article/post/${articleId}/edit`
  const getEditingArticle = await getData(url2)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (getEditingArticle.internalServerError) {
    router.push('/server-error')
  }

  title.value = getEditingArticle.article.title
  content.value = getEditingArticle.article.content
  metaDescription.value = getEditingArticle.article.meta_description
  publicStatus.value = getEditingArticle.article.public_status === 1
})

// contentの変更を監視してmarkdownContentを更新
watch(content, (newVal) => {
  markdownContent.value = marked(newVal)
})

const onSubmit = async () => {
  const url = `/article/post/${articleId}`
  const formData = new FormData()
  formData.append('adminId', adminId.value)
  formData.append('title', title.value)
  formData.append('content', content.value)
  formData.append('metaDescription', metaDescription.value)
  formData.append('publicStatus', publicStatus.value ? '1' : '0')

  const updateArticle = await updateData(url, formData)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (updateArticle.internalServerError) {
    router.push('/server-error')
  }

  router.push('/article')
}
</script>

<template>
  <WithSidebarLayout>
    <div class="navigation">
      <h2>EditArticle</h2>
      <p>You can edit articles.</p>
    </div>

    <q-form @submit="onSubmit">
      <q-input
        filled
        v-model="title"
        label="Title"
        :rules="[(val) => (val && val.length > 0) || 'Please enter your title.']"
        class="md-filled"
      >
        <template v-slot:prepend>
          <q-icon name="title" />
        </template>
      </q-input>

      <q-input
        v-model="content"
        filled
        autogrow
        type="textarea"
        label="Content"
        :rules="[(val) => (val && val.length > 0) || 'Please enter your content.']"
        style="margin-bottom: 15px"
      >
        <template v-slot:prepend>
          <q-icon name="edit" />
        </template>
      </q-input>

      <div class="preview">
        <div class="thumbnail-area">
          <h1>The article will be previewed.</h1>
        </div>

        <PreviewMarkdown :markdown-content="markdownContent" />
      </div>

      <q-input
        v-model="metaDescription"
        filled
        autogrow
        type="textarea"
        label="MetaDescription"
        :rules="[(val) => (val && val.length > 0) || 'Please enter your metaDescription.']"
        style="margin-bottom: 15px"
      >
        <template v-slot:prepend>
          <q-icon name="edit" />
        </template>
      </q-input>

      <q-toggle v-model="publicStatus" label="公開する" />
      <q-btn :label="publicStatus ? '公開する' : '下書き保存'" type="submit" />
    </q-form>
  </WithSidebarLayout>
</template>

<style lang="scss">
.navigation {
  text-align: center;
  padding: 30px;
  background-color: #ffffff;

  h2 {
    color: #222222;
    font-weight: bold;
    font-size: 25px;
    line-height: 1.5;
  }

  p {
    color: #333333;
    font-size: 14px;
    margin-bottom: 0px;
  }
}

.q-form {
  margin: 30px 0;

  .md-filled {
    width: 50%;
  }

  .q-input {
    margin-bottom: 15px;
  }

  .q-file {
    margin-bottom: 15px;
  }

  .preview {
    background-color: #ffffff;
    padding: 45px 40px;
    margin-bottom: 35px;

    .thumbnail-area {
      text-align: center;

      h1 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
        line-height: 1.3;
      }
    }
  }

  .q-btn {
    background-color: #3ea8ff;
    color: #ffffff;
    margin-left: 10px;
  }
}
</style>
