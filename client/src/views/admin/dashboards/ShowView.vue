<script setup lang="ts">
import { onMounted } from 'vue';
import { RouterLink, useRouter } from 'vue-router'

const router = useRouter();

onMounted(async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/session', {
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('authToken')}`,
      },
    });

    if (!response.ok) {
      router.push('/session/create');
    }
  } catch (error) {
    console.error('ログイン状態の判定エラー:', error);
    router.push('/session/create');
  }
});
</script>

<template>
  <header>
    <div className="header-container">
      <div className="header-logo">
        <router-link to="/session/create">
          <img src="../../../assets/img/logoB.png" alt="">
        </router-link>
      </div>
    </div>
  </header>

  <main>
    <div class="side-area">
      <div class="side-container">
        <div class="user">
          <img src="../../../assets/img/avatar.png" alt="">

          <div class="user-name">
            <h5>Hayate</h5>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512" fill="#FFFFFF">
                <path
                  d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
              </svg>
            </a>
          </div>
        </div>

        <div class="menu">
          <ul>
            <li>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                  <path
                    d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c.2 35.5-28.5 64.3-64 64.3H128.1c-35.3 0-64-28.7-64-64V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24zM352 224a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm-96 96c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H256z" />
                </svg>
                Dashboard
              </a>
            </li>

            <li>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                  <path
                    d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z" />
                </svg>
                Blogs
              </a>
            </li>

            <li>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                  <path
                    d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                </svg>
                Tags
              </a>
            </li>

            <li>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                  <path
                    d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z" />
                </svg>
                Contacts
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="content-area">
      <div class="content-container">
        <div class="blogs">
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
            <path
              d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z" />
          </svg>

          <h2>Blogs</h2>
        </div>

        <div class="tags">
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
            <path
              d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
          </svg>

          <h2>Tags</h2>
        </div>

        <div class="contacts">
          <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
            <path
              d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z" />
          </svg>

          <h2>Contacts</h2>
        </div>
      </div>
    </div>
  </main>
</template>

<style lang="scss">
body {
  background-color: #212529;
}

header {
  background-color: #31373D;
  position: fixed;
  top: 0;
  width: 100%;

  .header-container {
    max-width: 1200px;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: auto;

    .header-logo {
      a {
        display: flex;
        align-items: center;

        img {
          width: 130px;
          height: auto;
        }
      }
    }
  }
}

main {
  margin-top: 60px;
  display: flex;

  .side-area {
    width: 250px;

    .side-container {
      position: sticky;
      top: 60px;
      height: calc(100vh - 60px);
      background-color: #31373D;
      color: #FFFFFF;

      .user {
        background-color: #2B3136;
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

            svg {
              fill: #FFFFFF;
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
              color: #E4E7EDBF;
              text-decoration: none;
              display: flex;
              align-items: center;

              svg {
                fill: #E4E7EDBF;
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

  .content-area {
    width: calc(100% - 250px);
    padding: 40px 80px;

    .content-container {
      display: flex;
      gap: 20px;

      .blogs {
        width: 33.33%;
        background-color: #0284c7;
        border-radius: 5px;
        padding: 36px 26px;
        text-align: center;

        svg {
          fill: #FFFFFF;
          width: 55px;
          height: 55px;
          margin-right: 8px;
        }

        h2 {
          font-size: 20px;
          font-weight: bold;
          color: #FFFFFF;
          margin-top: 10px;
        }
      }

      .tags {
        width: 33.33%;
        background-color: #0891b2;
        border-radius: 5px;
        padding: 36px 26px;
        text-align: center;

        svg {
          fill: #FFFFFF;
          width: 55px;
          height: 55px;
          margin-right: 8px;
        }

        h2 {
          font-size: 20px;
          font-weight: bold;
          color: #FFFFFF;
          margin-top: 10px;
        }
      }

      .contacts {
        width: 33.33%;
        background-color: #65a30d;
        border-radius: 5px;
        padding: 36px 26px;
        text-align: center;

        svg {
          fill: #FFFFFF;
          width: 55px;
          height: 55px;
          margin-right: 8px;
        }

        h2 {
          font-size: 20px;
          font-weight: bold;
          color: #FFFFFF;
          margin-top: 10px;
        }
      }
    }
  }
}
</style>