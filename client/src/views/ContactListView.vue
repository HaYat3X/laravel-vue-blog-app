<script setup lang="ts">
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { ref } from 'vue'
import WithSidebarLayout from '@/components/layouts/admin/WithSidebarLayout.vue'
import type { Contact } from '@/types/contact'
import { isLogin } from '@/apis/auth/session'
import { getAllContact } from '@/apis/contact/posts'
import Pagination from '@/components/elements/Pagination.vue'

const router = useRouter()
const contacts = ref<Contact[]>([])
const currentPage = ref(1)
const lastPage = ref()

const fetchContacts = async (page: number) => {
  const getAllContactResponse = await getAllContact(page)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  // ログインに失敗した場合も500ページに飛ばしているのはよくないので修正を！
  if (getAllContactResponse.internalServerError) {
    router.push('/error')
  }

  contacts.value = getAllContactResponse.contacts.data
  currentPage.value = getAllContactResponse.contacts.current_page
  lastPage.value = getAllContactResponse.contacts.last_page
}

onMounted(async () => {
  const isLoginResponse = await isLogin()

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  // ログインに失敗した場合も500ページに飛ばしているのはよくないので修正を！
  if (isLoginResponse.internalServerError) {
    router.push('/error')
  }

  fetchContacts(currentPage.value)
})

// const onClick = async (articleId: number) => {
//   const response = await removeArticle(articleId)

//   // サーバーエラーが発生した場合、500ページにリダイレクトする
//   // ログインに失敗した場合も500ページに飛ばしているのはよくないので修正を！
//   if (response.internalServerError) {
//     router.push('/error')
//   }

//   location.reload()
// }

const changePage = (page: number) => {
  fetchContacts(page)
}
</script>

<template>
  <WithSidebarLayout>
    <div class="content-area">
      <div class="content-container">
        <div class="box">
          <h2>ContactLists</h2>
          <p>Manage your inquiries.</p>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>CATEGORY</th>
              <th>CONTENT</th>
              <th>ACTION</th>
            </tr>
          </thead>

          <tbody v-for="contact in contacts" :key="contact.id">
            <tr>
              <th class="number">{{ contact.id }}</th>
              <td>{{ contact.name }}</td>
              <td>{{ contact.email }}</td>
              <td>{{ contact.category }}</td>
              <td>{{ contact.content }}</td>
              <td class="action">
                <!-- <button @click="onClick(contact.id)"> -->
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                    <path
                      d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                  </svg>
                <!-- </button> -->
              </td>
            </tr>
          </tbody>
        </table>

        <Pagination v-if="contacts.length" :current-page="currentPage" :last-page="lastPage" @changePage="changePage" />
      </div>
    </div>
  </WithSidebarLayout>
</template>

<style scoped lang="scss">
.content-area {
  width: calc(100% - 250px);
  padding: 40px 80px;

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

    .table {
      margin: 20px 0;
      color: #ffffff;
      width: 100%;
      background-color: #2b2f32;
      padding: 10px;
      border-radius: 5px;

      th {
        font-size: 14px;
        color: #e4e7edbf;
        padding: 10px 0;
        border-bottom: 1px solid #181b1e;
      }

      td {
        font-size: 14px;
        color: #e4e7edbf;
        padding: 13px 0;
        border-bottom: 1px solid #181b1e;
        text-align: center;
      }

      thead {
        tr {
          th {
            border-bottom: 2px solid #181b1e;
            padding: 10px 0;
            font-weight: bold;
            text-align: center;
          }
        }
      }

      .number {
        padding: 0 10px;
      }

      .public {
        background-color: #d97706;
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 5px;
        font-weight: bold;
      }

      .private {
        background-color: #65a30d;
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 5px;
        font-weight: bold;
      }

      .action {
        button {
          background-color: #2b2f32;
          border: none;
          cursor: pointer;

          svg {
            fill: #ffffff;
            width: 14px;
            height: 14px;
          }
        }
      }
    }
  }
}
</style>
