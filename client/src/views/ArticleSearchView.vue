<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/NoSidebarLayout.vue';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const keyword = ref('');
const router = useRouter();

/**
 * 検索されたキーワードを検索結果画面へ送信する
 */
const onsubmit = () => {
  router.push({ path: '/search_result', query: { keyword: keyword.value } });
}

/**
 * 検索されたタグを検索結果画面へ送信する
 * @param {string} tag
 */
 const onclick = (tag: string) => {
  router.push({ path: '/search_result', query: { tag: tag } });
}
</script>

<template>
  <NoSidebarLayout>
    <div class="search-area">
      <form class="search-form-6" @submit.prevent="onsubmit">
        <label>
          <input type="text" v-model="keyword" placeholder="キーワードを入力..." required>
        </label>
      </form>

      <div class="search-tag">
        <h3>タグで検索</h3>
        <div class="tag">
          <a @click="onclick('aaaa')">
            <label for="">{{ '#aaaa' }}</label>
          </a>

          <a href="/">
            <label for="">{{ '#aaaa' }}</label>
          </a>
        </div>
      </div>
    </div>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
.search-area {
  .search-form-6 {
    display: flex;
    align-items: center;
    overflow: hidden;
    border: 1px solid #dfe1e5;
    border-radius: 24px;
    background-color: #ffffff;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      border-radius: 35px;
    }

    @media only screen and (min-width: 1024px) {
      border-radius: 35px;
    }

    &:hover {
      box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
      border: 1px solid #3ea8ff;
    }

    &::before {
      width: 45px;
      height: 16px;
      background-image: url('data:image/svg+xml;charset=utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%20%3Cpath%20d%3D%22M23.7%2020.8%2019%2016.1c-.2-.2-.5-.3-.8-.3h-.8c1.3-1.7%202-3.7%202-6C19.5%204.4%2015.1%200%209.7%200S0%204.4%200%209.7s4.4%209.7%209.7%209.7c2.3%200%204.3-.8%206-2v.8c0%20.3.1.6.3.8l4.7%204.7c.4.4%201.2.4%201.6%200l1.3-1.3c.5-.5.5-1.2.1-1.6zm-14-5.1c-3.3%200-6-2.7-6-6s2.7-6%206-6%206%202.7%206%206-2.6%206-6%206z%22%20fill%3D%22%239aa0a6%22%3E%3C%2Fpath%3E%20%3C%2Fsvg%3E');
      background-position: center;
      background-repeat: no-repeat;
      content: '';
    }

    input {
      height: 45px;
      padding: 20px 0;
      font-size: 16px;
      border: none;
      box-sizing: border-box;
      outline: none;
      background-color: #ffffff;

      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        height: 55px;
      }

      @media only screen and (min-width: 1024px) {
        height: 55px;
      }
    }
  }

  .search-tag {
    margin-top: 30px;

    h3 {
      font-weight: bold;
      font-size: 15px;
      margin-bottom: 10px;
    }

    .tag {
      display: flex;
      column-gap: 5px;
      row-gap: 15px;
      flex-wrap: wrap;

      a {
        text-decoration: none;
      }

      label {
        background-color: #3ea8ff;
        color: #ffffff;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 50px;
        cursor: pointer;

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
          font-size: 14px;
        }

        @media only screen and (min-width: 1024px) {
          font-size: 14px;
        }
      }
    }
  }
}
</style>