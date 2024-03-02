<script setup lang="ts">
import { onMounted, ref, watch } from 'vue'
import { useRouter } from 'vue-router'
import WithSidebarLayout from '@/components/layouts/admin/WithSidebarLayout.vue'
import { getData, createData } from '@/services/api'
import { marked } from 'marked'
import PreviewMarkdown from '@/components/elements/PreviewMarkdown.vue'
import { useHead } from '@unhead/vue'

useHead({
  title: 'Submit Article',
})

const adminId = ref('')
const title = ref('')
const content = ref('')
const featuredImage: any = ref<File>()
const metaDescription = ref('')
const publicStatus = ref(false)
const router = useRouter()
const markdownContent = ref()

onMounted(async () => {
  const url = `/session/user`
  const user = await getData(url)

  adminId.value = user.admin.id

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (user.internalServerError) {
    router.push('/error')
  }
})

// contentの変更を監視してmarkdownContentを更新
watch(content, (newVal) => {
  markdownContent.value = marked(newVal)
})

const handleImageChange = (event: Event) => {
  const input = event.target as HTMLInputElement

  if (input.files && input.files.length > 0) {
    featuredImage.value = input.files[0]
  }
}

const onSubmit = async () => {
  const url = `/article/post`
  const formData = new FormData()
  formData.append('adminId', adminId.value)
  formData.append('title', title.value)
  formData.append('content', content.value)
  formData.append('featuredImage', featuredImage.value)
  formData.append('metaDescription', metaDescription.value)
  formData.append('publicStatus', publicStatus.value ? '1' : '0')

  const submitArticle = await createData(url, formData)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (submitArticle.internalServerError) {
    router.push('/error')
  }

  router.push('/posted_articles')
}
</script>

<template>
  <WithSidebarLayout>
    <div class="content-area">
      <div class="content-container">
        <div class="box">
          <h2>NewArticle</h2>
          <p>You can submit a new article.</p>
        </div>

        <form @submit.prevent="onSubmit" enctype="multipart/form-data">
          <div class="form-group">
            <p>Title</p>
            <input class="col-6" type="text" v-model="title" required />
          </div>

          <div class="form-group">
            <p>Content</p>
            <textarea v-model="content" required>Write in Markdown...</textarea>
            <PreviewMarkdown :markdown-content="markdownContent"/>
          </div>

          <div class="form-group">
            <p>FeaturedImage</p>
            <input type="file" @change="handleImageChange" required />
          </div>

          <div class="form-group">
            <p>MetaDescription</p>
            <textarea v-model="metaDescription" required>Write in MetaDescription...</textarea>
          </div>

          <div class="submit">
            <div class="iphone-switch">
              <input type="checkbox" v-model="publicStatus" id="iphoneSwitch" />
              <label class="iphone-slider" for="iphoneSwitch"></label>
            </div>

            <span>公開する</span>
            <button type="submit">{{ publicStatus ? '公開する' : '下書き保存' }}</button>
          </div>
        </form>
      </div>
    </div>
  </WithSidebarLayout>
</template>

<style lang="scss">
.content-area {
  width: calc(100% - 250px);
  padding: 0 40px;

  .content-container {
    .box {
      background-color: #2b2f32;
      text-align: center;
      border-radius: 5px;
      padding: 30px;

      h2 {
        color: #ffffff;
        font-weight: bold;
      }

      p {
        color: #e4e7edbf;
        font-size: 14px;
      }
    }

    .col-6 {
      width: 50%;
    }

    .col-12 {
      width: 100%;
    }

    form {
      margin: 50px auto;
      padding: 50px;
      background-color: #2b2f32;

      .form-group {
        margin-bottom: 20px;

        p {
          color: #ffffff;
          font-size: 16px;
          margin-bottom: 5px;
        }

        input[type='text'] {
          padding: 10px;
          background-color: #212529;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          color: #ffffff;

          &:focus {
            outline: none;
            border: 1px solid #3ea8ff;
          }
        }

        input[type='file'] {
          padding: 5px 0;
          background-color: #212529;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          color: #ffffff;

          &:focus {
            outline: none;
            border: 1px solid #3ea8ff;
          }
        }

        textarea {
          width: 100%;
          padding: 10px;
          background-color: #212529;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          color: #ffffff;
          height: 200px;

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
        padding: 6px 12px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        background-color: #3ea8ff;
        border: none;
        color: #ffffff;

        &:hover {
          background-color: #0f83fd;
        }
      }

      .submit {
        display: flex;
        align-items: center;

        .iphone-switch {
          position: relative;
          display: inline-block;
          width: 45px;
          height: 24px;
          margin-right: 5px;
        }

        span {
          font-size: 14px;
          font-weight: bold;
          color: #ffffff;
          margin-right: 15px;
        }

        .iphone-switch input {
          display: none;
        }

        .iphone-slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: 0.4s;
          transition: 0.4s;
          border-radius: 34px;
        }

        .iphone-slider:before {
          position: absolute;
          content: '';
          height: 20px;
          width: 20px;
          left: 2px;
          bottom: 2px;
          background-color: white;
          -webkit-transition: 0.4s;
          transition: 0.4s;
          border-radius: 50%;
        }

        input:checked + .iphone-slider {
          background-color: #2196f3;
        }

        input:checked + .iphone-slider:before {
          -webkit-transform: translateX(21px);
          -ms-transform: translateX(21px);
          transform: translateX(21px);
        }
      }

      .content {
        background-color: #ffffff;
        border-radius: 5px;
        padding: 25px;

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
          word-break: break-all;
          color: #000000;
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
          content: '•';
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
}
</style>
