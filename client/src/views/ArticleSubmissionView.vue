<script setup lang="ts">
import { onMounted } from 'vue';
import { RouterLink, useRouter } from 'vue-router';
import { ref } from 'vue';

const title = ref('');
const content = ref('');
const featuredImage = ref<File | null>(null);
const metaDescription = ref('');
const publicStatus = ref(false);
const errors = ref({
  title: '',
  content: '',
  featuredImage: '',
  metaDescription: ''
});

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

const handleImageChange = (event: Event) => {
  const input = event.target as HTMLInputElement;
  if (input.files && input.files.length > 0) {
    featuredImage.value = input.files[0];
  }
};

// フォームのバリデーション関数
const validateForm = () => {
  errors.value.title = '';
  errors.value.content = '';
  errors.value.featuredImage = '';
  errors.value.metaDescription = '';

  let validFlag = true

  // タイトルのバリデーション
  if (!title.value.trim()) {
    errors.value.title = 'Please enter the title of your article.';
    validFlag = false;
  }

  // コンテンツのバリデーション
  if (!content.value.trim()) {
    errors.value.content = 'Please enter the text of the article.';
    validFlag = false;
  }

  if (!featuredImage.value) {
    errors.value.featuredImage = 'Please enter a thumbnail image for the article.';
    validFlag = false;
  }

  if (!metaDescription.value.trim()) {
    errors.value.metaDescription = 'Please enter a description of the article.';
    validFlag = false;
  }

  // 一つもエラーがない場合は、trueを返したい
  return validFlag;
};

const formSubmit = async () => {
  if (validateForm()) {
    try {
      if (featuredImage.value) {
        const formData = new FormData();
        formData.append('adminId', '1');
        formData.append('title', title.value);
        formData.append('content', content.value);
        formData.append('metaDescription', metaDescription.value);
        formData.append('publicStatus', publicStatus ? '1' : '0');
        formData.append('featuredImage', featuredImage.value);

        const response = await fetch('http://127.0.0.1:8000/api/article', {
          method: 'POST',
          headers: {
            'Authorization': `Bearer ${localStorage.getItem('authToken')}`,
          },
          body: formData,
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        router.push('/admin/article');
      }
    } catch (error) {
      console.error('POSTリクエストエラー:', error);
    }
  } else {
    // フォームがバリデーションエラーの場合の処理
    console.log('フォームにエラーがあります。');
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
              <router-link to="/admin/article">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                  <path
                    d="M192 32c0 17.7 14.3 32 32 32c123.7 0 224 100.3 224 224c0 17.7 14.3 32 32 32s32-14.3 32-32C512 128.9 383.1 0 224 0c-17.7 0-32 14.3-32 32zm0 96c0 17.7 14.3 32 32 32c70.7 0 128 57.3 128 128c0 17.7 14.3 32 32 32s32-14.3 32-32c0-106-86-192-192-192c-17.7 0-32 14.3-32 32zM96 144c0-26.5-21.5-48-48-48S0 117.5 0 144V368c0 79.5 64.5 144 144 144s144-64.5 144-144s-64.5-144-144-144H128v96h16c26.5 0 48 21.5 48 48s-21.5 48-48 48s-48-21.5-48-48V144z" />
                </svg>
                Articles
              </router-link>
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
          <h2>NewArticle</h2>
          <p>You can submit a new article.</p>
        </div>

        <form @submit.prevent="formSubmit">
          <div class="form-group">
            <p>Title</p>
            <input class="col-6" type="text" v-model="title" />
            <p class="error-msg">{{ errors.title }}</p>
          </div>

          <div class="form-group">
            <p>Content</p>
            <textarea v-model="content">Write in Content...</textarea>
            <p class="error-msg">{{ errors.content }}</p>
          </div>

          <div class="form-group">
            <p>FeaturedImage</p>
            <input type="file" @change="handleImageChange" />
            <p class="error-msg">{{ errors.featuredImage }}</p>
          </div>

          <div class="form-group">
            <p>MetaDescription</p>
            <textarea v-model="metaDescription">Write in MetaDescription...</textarea>
            <p class="error-msg">{{ errors.metaDescription }}</p>
          </div>

          <div class="submit">
            <div class="iphone-switch">
              <input type="checkbox" v-model="publicStatus" id="iphoneSwitch">
              <label class="iphone-slider" for="iphoneSwitch"></label>
            </div>

            <span>公開する</span>
            <button type="submit">{{ publicStatus ? '公開する' : '下書き保存' }}</button>
          </div>
        </form>
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

      .col-6 {
        width: 50%;
      }

      .col-12 {
        width: 100%;
      }

      form {
        margin: 50px auto;
        padding: 50px;
        background-color: #2B2F32;

        .form-group {
          margin-bottom: 20px;

          p {
            color: #FFFFFF;
            font-size: 16px;
            margin-bottom: 5px;
          }

          input[type="text"] {
            padding: 10px;
            background-color: #212529;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #FFFFFF;

            &:focus {
              outline: none;
              border: 1px solid #3ea8ff;
            }
          }

          input[type="file"] {
            padding: 5px 0;
            background-color: #212529;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #FFFFFF;

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
            color: #FFFFFF;
            height: 200px;

            &:focus {
              outline: none;
              border: 1px solid #3ea8ff;
            }
          }

          .error-msg {
            color: #E76868;
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
          color: #FFFFFF;

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
            color: #FFFFFF;
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
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
          }

          .iphone-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
          }

          input:checked+.iphone-slider {
            background-color: #2196F3;
          }

          input:checked+.iphone-slider:before {
            -webkit-transform: translateX(21px);
            -ms-transform: translateX(21px);
            transform: translateX(21px);
          }
        }
      }
    }
  }
}
</style>