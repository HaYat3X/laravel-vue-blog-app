<script setup lang="ts">
import { RouterLink, useRouter } from 'vue-router'
import { signOut } from '@/apis/auth/session'
import { deleteData } from '@/services/api';

const router = useRouter()

const handleClick = async () => {
  const url = `api/session/sign_out`
  const signOut = await deleteData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (signOut.internalServerError) {
    router.push('/error')
  }

  router.push('/')
}
</script>

<template>
  <div class="side-area">
    <div class="side-container">
      <div class="user">
        <img src="../../../assets/img/avatar.png" alt="" />

        <div class="user-name">
          <h5>Hayate</h5>
          <a @click="handleClick">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="16"
              width="16"
              viewBox="0 0 512 512"
              fill="#FFFFFF"
            >
              <path
                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
              />
            </svg>
          </a>
        </div>
      </div>

      <div class="menu">
        <ul>
          <li>
            <router-link to="/posted_articles">
              <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                <path
                  d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z"
                />
              </svg>
              Articles
            </router-link>
          </li>

          <li>
            <a href="/contact_list">
              <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                <path
                  d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z"
                />
              </svg>
              Contacts
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.side-area {
  width: 250px;

  .side-container {
    position: sticky;
    top: 60px;
    height: calc(100vh - 60px);
    background-color: #31373d;
    color: #ffffff;

    .user {
      background-color: #2b3136;
      padding: 20px 0;
      text-align: center;

      img {
        width: 65px;
        height: 65px;
        object-fit: cover;
        border-radius: 50%;
      }

      .user-name {
        display: flex;
        margin-top: 10px;
        justify-content: center;

        h5 {
          font-size: 14px;
          font-weight: bold;
          margin-right: 10px;
        }

        a {
          text-decoration: none;
          display: flex;
          align-items: center;
          cursor: pointer;

          svg {
            fill: #ffffff;
            width: 18px;
            height: 18px;
          }
        }
      }
    }

    .menu {
      ul {
        padding: 24px;

        li {
          list-style: none;
          padding: 8px 0;

          a {
            color: #e4e7edbf;
            text-decoration: none;
            display: flex;
            align-items: center;

            svg {
              fill: #e4e7edbf;
              width: 16px;
              height: 16px;
              margin-right: 8px;
            }
          }
        }
      }
    }
  }
}
</style>
