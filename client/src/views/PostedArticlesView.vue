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


const handleClick = async () => {
  try {
    const response = await fetch('http://127.0.0.1:8000/api/session', {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${localStorage.getItem('authToken')}`,
      },
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    router.push('/session/create');
    console.log('ログアウトした。');
  } catch (error) {
    console.error('POSTリクエストエラー:', error);
  }
};
</script>

<template>
  <header>
    <div className="header-container">
      <div className="header-logo">
        <router-link to="/session/create">
          <img src="../assets/img/logoB.png" alt="">
        </router-link>
      </div>
    </div>
  </header>

  <main>
    <div class="side-area">
      <div class="side-container">
        <div class="user">
          <img src="../assets/img/avatar.png" alt="">

          <div class="user-name">
            <h5>Hayate</h5>
            <a @click="handleClick">
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
        <div class="box">
          <h2>BlogsTable</h2>
          <p>Manage submitted articles.</p>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>TITLE</th>
              <th>STATUS</th>
              <th>ACTIONS</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <th class="number">1</th>
              <td>テーブルのセル</td>
              <td>
                <label class="public">
                  Public
                </label>
              </td>
              <td class="action">
                <button>
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path
                      d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                  </svg>
                </button>
                <button>
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                    <path
                      d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                  </svg>
                </button>
              </td>
            </tr>

            <tr>
              <th class="number">2</th>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem</td>
              <td>
                <label class="private">
                  Private
                </label>
              </td>
              <td class="action">
                <button>
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path
                      d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                  </svg>
                </button>
                <button>
                  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                    <path
                      d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                  </svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
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
            cursor: pointer;

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
    padding: 40px;

    .content-container {
      .box {
        background-color: #2B2F32;
        text-align: center;
        border-radius: 5px;
        padding: 30px;

        h2 {
          color: #FFFFFF;
          font-weight: bold;
        }

        p {
          color: #E4E7EDBF;
          font-size: 14px;
        }
      }

      .table {
        margin-top: 20px;
        color: #FFFFFF;
        width: 100%;
        background-color: #2B2F32;
        padding: 10px;
        border-radius: 5px;

        th {
          font-size: 14px;
          color: #E4E7EDBF;
          padding: 10px 0;
          border-bottom: 1px solid #181b1e;
        }

        td {
          font-size: 14px;
          color: #E4E7EDBF;
          padding: 13px 0;
          border-bottom: 1px solid #181b1e;
        }

        thead {
          tr {
            th {
              border-bottom: 2px solid #181b1e;
              padding: 10px 0;
              font-weight: bold;
              text-align: left;
            }
          }
        }

        .number {
          padding: 0 10px;
        }

        .public {
          background-color: #D97706;
          padding: 4px 8px;
          font-size: 12px;
          border-radius: 5px;
          font-weight: bold;
        }

        .private {
          background-color: #65A30D;
          padding: 4px 8px;
          font-size: 12px;
          border-radius: 5px;
          font-weight: bold;
        }

        .action {
          button {
            background-color: #2B2F32;
            border: none;
            cursor: pointer;

            svg {
              fill: #FFFFFF;
              width: 14px;
              height: 14px;
            }
          }
        }
      }
    }
  }
}
</style>