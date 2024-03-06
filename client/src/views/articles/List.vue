<script setup lang="ts">
import { onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { ref } from 'vue'
import WithSidebarLayout from '@/components/layouts/admin/WithSidebarLayout.vue'
import type { Article } from '@/types/article'
import Pagination from '@/components/elements/Pagination.vue'
import { getData, deleteData } from '@/services/api'
import { useHead } from '@unhead/vue'

useHead({
  title: 'Articles List'
})

const router = useRouter()
const articles = ref<Article[]>([])
const currentPage = ref(1)
const lastPage = ref()
const confirm = ref(false)
const articleId = ref()

const fetchArticles = async (page: number) => {
  const url = `/article/post?page=${page}`
  const getAllArticle = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (getAllArticle.internalServerError) {
    router.push('/server-error')
  }

  articles.value = getAllArticle.articles.data
  currentPage.value = getAllArticle.articles.current_page
  lastPage.value = getAllArticle.articles.last_page
}

onMounted(async () => {
  const url = `/session/user`
  const user = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (user.internalServerError) {
    router.push('/server-error')
  }

  fetchArticles(currentPage.value)
})

// 削除する記事IDを取得する
const onClick = async (id: number) => {
  articleId.value = id
}

// 記事を削除する
const deleteArticle = async () => {
  const url = `/article/post/${articleId.value}`
  const removeArticle = await deleteData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (removeArticle.internalServerError) {
    router.push('/server-error')
  }

  location.reload()
}

const changePage = (page: number) => {
  fetchArticles(page)
}
</script>

<template>
  <WithSidebarLayout>
    <div class="navigation-area">
      <h2>ArticleLists</h2>
      <p>Manage submitted articles.</p>
      <q-btn to="/article/submit" label="New Article" />
    </div>

    <q-markup-table class="no-shadow">
      <thead>
        <tr>
          <th class="text-center">NO</th>
          <th class="text-left">TITLE</th>
          <th class="text-left">STATUS</th>
          <th class="text-left">ACTIONS</th>
        </tr>
      </thead>

      <tbody v-for="article in articles" :key="article.id">
        <tr>
          <th class="number text-center">{{ article.id }}</th>

          <td>{{ article.title }}</td>

          <td>
            <q-badge v-if="article.public_status == 1" color="secondary"> Public </q-badge>
            <q-badge v-else color="orange"> Private </q-badge>
          </td>

          <td class="action">
            <q-btn
              :to="`/article/${article.id}/edit`"
              flat
              round
              color="primary"
              icon="edit"
              size="sm"
            />

            <q-btn
              flat
              round
              color="red"
              icon="delete"
              size="sm"
              @click="(confirm = true), onClick(article.id)"
            />

            <q-dialog v-model="confirm">
              <q-card>
                <q-card-section>
                  <div class="text-h6">May I run it?</div>
                </q-card-section>

                <q-card-section class="q-pt-none">
                  I am trying to delete an article. May I run it?
                </q-card-section>

                <q-card-actions align="right">
                  <q-btn flat label="cancel" color="red" v-close-popup />
                  <q-btn flat label="OK" color="primary" @click="deleteArticle" />
                </q-card-actions>
              </q-card>
            </q-dialog>
          </td>
        </tr>
      </tbody>
    </q-markup-table>

    <Pagination
      v-if="articles.length"
      :current-page="currentPage"
      :last-page="lastPage"
      @changePage="changePage"
    />
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
    margin-bottom: 20px;
  }

  .q-btn {
    background-color: #3ea8ff;
    color: #ffffff;
  }
}

.q-markup-table {
  margin: 30px 0;
}
</style>
