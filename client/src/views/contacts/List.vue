<script setup lang="ts">
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { ref } from 'vue'
import WithSidebarLayout from '@/components/layouts/admin/WithSidebarLayout.vue'
import type { Contact } from '@/types/contact'
import Pagination from '@/components/elements/Pagination.vue'
import { getData, deleteData } from '@/services/api'
import { useHead } from '@unhead/vue'

useHead({
  title: 'Contacts List'
})

const router = useRouter()
const contacts = ref<Contact[]>([])
const currentPage = ref(1)
const lastPage = ref()
const confirm = ref(false)
const contactId = ref()

const fetchContacts = async (page: number) => {
  const url = `/contact?page=${page}`
  const getAllContact = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (getAllContact.internalServerError) {
    router.push('/server-error')
  }

  contacts.value = getAllContact.contacts.data
  currentPage.value = getAllContact.contacts.current_page
  lastPage.value = getAllContact.contacts.last_page
}

onMounted(async () => {
  const url = `/session/user`
  const user = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (user.internalServerError) {
    router.push('/server-error')
  }

  fetchContacts(currentPage.value)
})

// 削除する記事IDを取得する
const onClick = async (id: number) => {
  contactId.value = id
}

const deleteContact = async () => {
  const url = `/contact/${contactId.value}`
  const removeContact = await deleteData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (removeContact.internalServerError) {
    router.push('/server-error')
  }

  location.reload()
}

const changePage = (page: number) => {
  fetchContacts(page)
}
</script>

<template>
  <WithSidebarLayout>
    <div class="navigation-area">
      <h2>ContactLists</h2>
      <p>Manage submitted contacts.</p>
    </div>

    <q-markup-table class="no-shadow">
      <thead>
        <tr>
          <th class="text-center">NO</th>
          <th class="text-left">NAME</th>
          <th class="text-left">EMAIL</th>
          <th class="text-left">CATEGORY</th>
          <th class="text-left">CONTENT</th>
          <th class="text-left">ACTION</th>
        </tr>
      </thead>

      <tbody v-for="contact in contacts" :key="contact.id">
        <tr>
          <th class="number text-center">{{ contact.id }}</th>

          <td>{{ contact.name }}</td>
          <td>{{ contact.email }}</td>
          <td>{{ contact.category }}</td>
          <td>{{ contact.content }}</td>

          <td class="action">
            <q-btn
              flat
              round
              color="red"
              icon="delete"
              size="sm"
              @click="(confirm = true), onClick(contact.id)"
            />

            <q-dialog v-model="confirm">
              <q-card>
                <q-card-section>
                  <div class="text-h6">May I run it?</div>
                </q-card-section>

                <q-card-section class="q-pt-none">
                  I am trying to delete my inquiry. May I execute it?
                </q-card-section>

                <q-card-actions align="right">
                  <q-btn flat label="cancel" color="red" v-close-popup />
                  <q-btn flat label="OK" color="primary" @click="deleteContact" />
                </q-card-actions>
              </q-card>
            </q-dialog>
          </td>
        </tr>
      </tbody>
    </q-markup-table>
  </WithSidebarLayout>
</template>

<style scoped lang="scss">
.navigation-area {
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

  .q-btn {
    background-color: #3ea8ff;
    color: #ffffff;
  }
}
</style>
