<script setup lang="ts">
import { RouterLink, useRouter } from 'vue-router'
import { deleteData } from '@/services/api'
import { ref } from 'vue'

const router = useRouter()
const drawerLeft = ref(false)

const menuList = [
  {
    icon: 'article',
    label: 'Article',
    separator: true,
    link: '/article'
  },
  {
    icon: 'contact_page',
    label: 'Contact',
    separator: true,
    link: '/contact'
  }
]

const handleClick = async () => {
  const url = `/session/logout`
  const logout = await deleteData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (logout.internalServerError) {
    router.push('/error')
  }

  router.push('/')
}
</script>

<template>
  <q-drawer v-model="drawerLeft" show-if-above :width="220" elevated>
    <q-scroll-area class="fit">
      <q-list>
        <template v-for="(menuItem, index) in menuList" :key="index">
          <a :href="menuItem.link">
            <q-item clickable :active="menuItem.label === 'Outbox'" v-ripple>
              <q-item-section avatar>
                <q-icon :name="menuItem.icon" />
              </q-item-section>
              <q-item-section>
                {{ menuItem.label }}
              </q-item-section>
            </q-item>
            <q-separator :key="'sep' + index" v-if="menuItem.separator" />
          </a>
        </template>

        <q-item clickable v-ripple @click="handleClick">
          <q-item-section avatar>
            <q-icon name="exit_to_app" />
          </q-item-section>
          <q-item-section> Logout </q-item-section>
        </q-item>
      </q-list>
    </q-scroll-area>
  </q-drawer>
</template>

<style scoped lang="scss">
.q-drawer {
  a {
    text-decoration: none;
    color: #222222;
  }
}
</style>
