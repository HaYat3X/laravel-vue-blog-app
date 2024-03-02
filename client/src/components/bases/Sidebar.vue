<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import type { Article } from '@/types/article'
import { getData } from '@/services/api'

const router = useRouter()
const articles = ref<Article[]>([])

onMounted(async () => {
  const url = `/article/public?page=${1}`
  const getPublishedArticle = await getData(url)

  // サーバーエラーが発生した場合、500ページにリダイレクトする
  if (getPublishedArticle.error) {
    router.push('/error')
  }

  articles.value = getPublishedArticle.articles.data
})
</script>

<template>
  <div class="sidebar-area">
    <div class="sidebar-container">
      <div class="profile-area">
        <div class="profile-container">
          <img src="../../assets/img/avatar.png" alt="avatar">

          <div>
            <h4>Hayate Takeda</h4>

            <span>
              <a href="https://github.com/Hayate12345" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                  <path
                    d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
                </svg>
              </a>

              <a href="https://twitter.com/EUREKA_221" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path
                    d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
                </svg>
              </a>
            </span>
          </div>
        </div>

        <p>
          鳥取県出身のエンジニア。<br>
          専門学校でIT技術を学んだのち、20才でIT業界へ。<br>
          時代に合わせた技術を追いかけつつ、クライアントに寄り添い、クライアントの悩みや課題を解決できる。
          そんなエンジニアになりたいと考えています。
        </p>
      </div>

      <div class="advertising-area">
        <h2>Recent Articles</h2>

        <div class="card" v-for="(article, index) in articles.slice(0, 3)" :key="article.id">
          <a :href="`/${article.slug}`">
            <div class="card-img">
              <!-- <img :src="`http://127.0.0.1:8000/storage/featured_image/${article.featured_image}`" alt=""> -->
              <img :src="`https://x162-43-70-220.static.shin-vps.jp/storage/featured_image/${article.featured_image}`" alt="">
            </div>

            <p>
              {{ article.title }}
            </p>

            <small>
              {{ article.created_at.slice(0, 10) }}
            </small>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
  
<style scoped lang="scss">
.sidebar-area {
  .sidebar-container {
    .profile-area {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;

      .profile-container {
        display: flex;
        align-items: center;

        img {
          width: 60px;
          height: 60px;
          object-fit: cover;
          border-radius: 50%;
          margin-right: 15px;
        }

        h4 {
          font-size: 16px;
          font-weight: bold;
          margin-bottom: 5px;
        }

        a {
          text-decoration: none;
          margin-right: 5px;

          svg {
            width: 18px;
            fill: #333333;
          }
        }
      }

      p {
        margin-top: 20px;
        font-size: 15px;
        color: #333333;
      }
    }

    .advertising-area {
      margin-top: 20px;

      h2 {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 5px;
      }

      .card {
        margin-bottom: 30px;

        a {
          text-decoration: none;
          color: #222222;
        }

        img {
          width: 100%;
          height: auto;
          border-radius: 5px;
          object-fit: cover;
          transition: opacity 0.3s;

          &:hover {
            opacity: 0.5;
          }
        }

        p {
          font-size: 16px;
          font-weight: bold;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
      }
    }
  }
}

@media only screen and (max-width: 767px) {
  .sidebar-area {
    margin-top: 50px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 1023px) {
  .sidebar-area {
    margin-top: 60px;

    .sidebar-container {
      .profile-area {
        .profile-container {
          img {
            width: 80px;
            height: 80px;
          }
        }
      }
    }
  }
}

@media only screen and (min-width: 1024px) {
  .sidebar-area {
    width: 300px;
  }
}
</style>