<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/user/NoSidebarLayout.vue'
import WorkCard from '@/components/elements/WorkCard.vue'
import type { ChartData } from 'chart.js/auto'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
  PointElement,
  RadialLinearScale,
  Filler,
  LineElement
} from 'chart.js/auto'
import { Radar } from 'vue-chartjs'
import { useHead } from '@unhead/vue'

useHead({
  title: '竹田 颯について',
  meta: [
    {
      name: 'discription',
      content:
        '鳥取県出身のエンジニア。専門学校でIT技術を学んだのち、20才でIT業界へ。時代に合わせた技術を追いかけつつ、クライアントに寄り添い、クライアントの悩みや課題を解決できる。 そんなエンジニアになりたいと考えています。'
    }
  ]
})

ChartJS.register(
  CategoryScale,
  LinearScale,
  BarElement,
  PointElement,
  RadialLinearScale,
  LineElement,
  Filler,
  Title,
  Tooltip,
  Legend
)

const frontendData: ChartData<'radar'> = {
  labels: ['HTML', 'CSS/SCSS', 'WordPress', 'JavaScript', 'jQuery'],
  datasets: [
    {
      label: 'Frontend',
      backgroundColor: 'rgba(0, 128, 0, 0.2)',
      borderColor: 'rgba(0, 128, 0, 0.2)',
      pointBackgroundColor: 'rgba(0, 128, 0, 0.2)',
      data: [4, 3, 3, 2, 2]
    }
  ]
}

const backendData: ChartData<'radar'> = {
  labels: ['PHP', 'Ruby', 'Java', 'Python', 'JavaScript'],
  datasets: [
    {
      label: 'backend',
      backgroundColor: 'rgba(255, 165, 0, 0.2)',
      borderColor: 'rgba(255, 165, 0, 0.2)',
      pointBackgroundColor: 'rgba(255, 165, 0, 0.2)',
      data: [4, 4, 1, 3, 2]
    }
  ]
}

const devOpsData: ChartData<'radar'> = {
  labels: ['Docker', 'VirtualBox', 'AWS', 'Heroku', 'Git/GitHub'],
  datasets: [
    {
      label: 'devOps',
      backgroundColor: 'rgba(255, 0, 0, 0.2)',
      borderColor: 'rgba(255, 0, 0, 0.2)',
      pointBackgroundColor: 'rgba(255, 0, 0, 0.2)',
      data: [3, 2, 1, 4, 4]
    }
  ]
}

const options = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    r: {
      min: 0,
      max: 5,
      stepSize: 1
    }
  }
}
</script>

<template>
  <NoSidebarLayout>
    <section class="about-me">
      <div class="row">
        <div class="col-md-7">
          <h1>Hayate Takeda.</h1>

          <p>
            鳥取県出身のエンジニア。<br />
            専門学校でIT技術を学んだのち、20才でIT業界へ。<br />
            時代に合わせた技術を追いかけつつ、クライアントに寄り添い、クライアントの悩みや課題を解決できる。
            そんなエンジニアになりたいと考えています。
          </p>
        </div>

        <div class="col-md-5">
          <img src="../../assets/img/thumbnail.png" alt="" />
        </div>
      </div>
    </section>

    <hr />

    <section class="my-works">
      <h2>My works</h2>

      <div class="works">
        <WorkCard -featured-imgae="/img/work/my-closet.png" -work-title="「MY CLOSET」" />

        <WorkCard -featured-imgae="/img/work/real-intention.png" -work-title="「Real intentioN」" />

        <WorkCard -featured-imgae="/img/work/travelogue.png" -work-title="「travelogue」" />

        <WorkCard -featured-imgae="/img/work/a-word.png" -work-title="「a Word」" />

        <WorkCard -featured-imgae="/img/work/my-news.png" -work-title="「My News」" />

        <WorkCard -featured-imgae="/img/work/pack-cat.png" -work-title="「Pack Cat」" />

        <WorkCard -featured-imgae="/img/work/pokemon-quiz.png" -work-title="「Pokemon Quiz」" />

        <WorkCard -featured-imgae="/img/work/todo-app.png" -work-title="「Todo App」" />

        <WorkCard -featured-imgae="/img/work/typing.png" -work-title="「Typing」" />

        <WorkCard -featured-imgae="/img/work/youtube-clone.png" -work-title="「Youtube Clone」" />

        <WorkCard
          -featured-imgae="/img/work/hayate-tech-lab.png"
          -work-title="「Hayate Tech Lab」"
        />
      </div>
    </section>

    <hr />

    <section class="my-skils">
      <h2>My skils</h2>

      <div class="skill">
        <div class="skill-item">
          <Radar :data="frontendData" :options="options" />
        </div>

        <div class="skill-item">
          <Radar :data="backendData" :options="options" />
        </div>

        <div class="skill-item">
          <Radar :data="devOpsData" :options="options" />
        </div>
      </div>
    </section>
  </NoSidebarLayout>
</template>

<style scoped lang="scss">
section {
  @media only screen and (min-width: 1024px) {
    max-width: 900px;
    margin: 0 auto;
  }
}

hr {
  margin: 30px 0;

  @media only screen and (min-width: 768px) and (max-width: 1023px) {
    margin: 45px 0;
  }

  @media only screen and (min-width: 1024px) {
    margin: 60px 0;
  }
}

.about-me {
  .row {
    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      width: 500px;
      margin: 0 auto;
    }

    h1 {
      font-weight: bold;
      font-size: 30px;
      color: #333333;
      line-height: 1;
      margin-bottom: 30px;

      @media only screen and (max-width: 1023px) {
        text-align: center;
      }

      @media only screen and (min-width: 768px) {
        font-size: 32px;
        margin-top: 35px;
      }
    }

    p {
      font-size: 15px;

      @media only screen and (min-width: 1024px) {
        margin-right: 30px;
      }
    }

    .col-md-5 {
      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        width: 500px;
        margin: 0 auto;
      }

      img {
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: 5px;

        @media only screen and (max-width: 1023px) {
          margin-top: 20px;
        }
      }
    }
  }
}

.my-works {
  h2 {
    text-align: center;
    font-size: 18px;
    font-weight: bold;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      font-size: 20px;
    }

    @media only screen and (min-width: 1024px) {
      font-size: 20px;
    }
  }

  .works {
    @media only screen and (min-width: 768px) {
      display: flex;
      flex-wrap: wrap;
      column-gap: 20px;
    }
  }
}

.my-skils {
  h2 {
    text-align: center;
    font-size: 18px;
    font-weight: bold;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      font-size: 20px;
    }

    @media only screen and (min-width: 1024px) {
      font-size: 20px;
    }
  }

  .skill {
    @media only screen and (min-width: 768px) {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .skill-item {
      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        width: 48.55%;
      }

      @media only screen and (min-width: 1024px) {
        width: 31.85%;
      }
    }
  }
}
</style>
