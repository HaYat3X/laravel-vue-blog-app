<script setup lang="ts">
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue';
import Button from '@/components/elements/Button.vue';
import { ref } from 'vue';
import { submitContact } from '@/apis/contact/posts'
import { useRouter } from 'vue-router';

const name = ref('');
const email = ref('');
const category = ref('');
const content = ref('');
const router = useRouter();

const onSubmit = async () => {
  const response = await submitContact(name.value, email.value, category.value, content.value);

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (response.internalServerError) {
    console.log(response.internalServerError.message);
    router.push('/error');
  }

  // 何もエラーがない場合は、お問い合わせ完了画面へ遷移する
  router.push('/contact_completion');
}

</script>

<template>
  <WithSidebarLayout>
    <div class="contact-container">
      <h2>Contact</h2>
      <p class="contact-text">
        竹田颯へのお問い合わせはこちらからお願いいたします。<br>
        <span>*</span>がついているものは必須項目です。
      </p>

      <form @submit.prevent="onSubmit" action="">
        <div class="form-control">
          <p>
            お名前
            <span>*</span>
          </p>

          <input type="text" v-model="name" required>
        </div>

        <div class="form-control">
          <p>
            メールアドレス
            <span>*</span>
          </p>

          <input type="email" v-model="email" required>
        </div>

        <div class="form-control">
          <p>
            お問い合わせカテゴリー
            <span>*</span>
          </p>

          <label class="selectbox-3">
            <select v-model="category" required>
              <option disabled value="">選択してください</option>
              <option>A</option>
              <option>B</option>
              <option>C</option>
            </select>
          </label>
        </div>

        <div class="form-control">
          <p>
            お問い合わせ内容
            <span>*</span>
          </p>

          <textarea required cols="30" rows="10" v-model="content"></textarea>
        </div>

        <Button>送信する</Button>
      </form>
    </div>
  </WithSidebarLayout>
</template>

<style scoped lang="scss">
.contact-container {
  h2 {
    font-weight: bold;
    font-size: 30px;
    color: #333333;
    margin-bottom: 10px;
  }

  .contact-text {
    margin-bottom: 20px;
  }

  span {
    color: red;
  }

  form {
    .form-control {
      margin-bottom: 30px;

      p {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 5px;
      }

      input {
        width: 100%;
        height: 45px;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        border: 1px solid #333333;

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
          width: 50%;
        }

        @media only screen and (min-width: 1024px) {
          width: 50%;
        }

        &:focus {
          box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
          border: 1px solid #3ea8ff;
          outline: none;
        }
      }

      .selectbox-3 {
        display: inline-flex;
        align-items: center;
        position: relative;
        width: 100%;

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
          width: 50%;
        }

        @media only screen and (min-width: 1024px) {
          width: 50%;
        }

        select {
          appearance: none;
          width: 100%;
          height: 45px;
          padding: 10px;
          border: 1px solid #333333;
          border-radius: 5px;
          font-size: 16px;
          cursor: pointer;

          &:focus {
            box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
            border: 1px solid #3ea8ff;
            outline: none;
          }
        }
      }

      .selectbox-3::after {
        position: absolute;
        right: 15px;
        width: 10px;
        height: 7px;
        background-color: #535353;
        clip-path: polygon(0 0, 100% 0, 50% 100%);
        content: '';
        pointer-events: none;
      }

      textarea {
        width: 100%;
        resize: vertical;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;

        &:focus {
          box-shadow: 0 1px 6px rgb(32 33 36 / 28%);
          border: 1px solid #3ea8ff;
          outline: none;
        }
      }
    }
  }
}
</style>