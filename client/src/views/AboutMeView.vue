<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/NoSidebarLayout.vue';
import WorkCard from '@/components/elements/WorkCard.vue';
import type { ChartData } from 'chart.js/auto';
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

ChartJS.register(CategoryScale, LinearScale, BarElement, PointElement, RadialLinearScale, LineElement, Filler, Title, Tooltip, Legend)

const frontendData: ChartData<'radar'> = {
  labels: [
    'HTML',
    'CSS/SCSS',
    'WordPress',
    'JavaScript',
    'jQuery',
  ],
  datasets: [
    {
      label: 'Frontend',
      backgroundColor: 'rgba(0, 128, 0, 0.2)',
      borderColor: 'rgba(0, 128, 0, 0.2)',
      pointBackgroundColor: 'rgba(0, 128, 0, 0.2)',
      data: [4, 3, 3, 2, 2]
    },
  ]
};

const backendData: ChartData<'radar'> = {
  labels: [
    'PHP',
    'Ruby',
    'Java',
    'Python',
    'JavaScript',
  ],
  datasets: [
    {
      label: 'backend',
      backgroundColor: 'rgba(255, 165, 0, 0.2)',
      borderColor: 'rgba(255, 165, 0, 0.2)',
      pointBackgroundColor: 'rgba(255, 165, 0, 0.2)',
      data: [4, 4, 1, 3, 2]
    },
  ]
};

const devOpsData: ChartData<'radar'> = {
  labels: [
    'Docker',
    'VirtualBox',
    'AWS',
    'Heroku',
    'Git/GitHub',
  ],
  datasets: [
    {
      label: 'devOps',
      backgroundColor: 'rgba(255, 0, 0, 0.2)',
      borderColor: 'rgba(255, 0, 0, 0.2)',
      pointBackgroundColor: 'rgba(255, 0, 0, 0.2)',
      data: [3, 2, 1, 4, 4]
    },
  ]
};

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
      <div class="about">
        <h1>Hayate Takeda.</h1>

        <p>
          鳥取県出身のエンジニア。<br>
          専門学校でIT技術を学んだのち、20才でIT業界へ。<br>
          時代に合わせた技術を追いかけつつ、クライアントに寄り添い、クライアントの悩みや課題を解決できる。
          そんなエンジニアになりたいと考えています。
        </p>
      </div>

      <div class="my-img">
        <img src="../assets/img/about-me/thumbnail.png" alt="">
      </div>
    </section>

    <hr>

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

        <WorkCard -featured-imgae="/img/work/hayate-tech-lab.png" -work-title="「Hayate Tech Lab」" />
      </div>
    </section>

    <hr>

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
  @media only screen and (min-width: 768px) and (max-width: 1023px) {
    max-width: 900px;
    margin: 0 auto;
  }

  @media only screen and (min-width: 1024px) {
    max-width: 900px;
    margin: 0 auto;
  }
}

hr {
  margin: 20px 0;

  @media only screen and (min-width: 768px) and (max-width: 1023px) {
    margin: 40px 0;
  }

  @media only screen and (min-width: 1024px) {
    margin: 60px 0;
  }
}

.about-me {
  @media only screen and (min-width: 768px) and (max-width: 1023px) {
    display: flex;
    align-items: center;
  }

  @media only screen and (min-width: 1024px) {
    display: flex;
    align-items: center;
  }

  .about {
    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      flex: 1.1;
      margin-right: 10px;
    }

    @media only screen and (min-width: 1024px) {
      flex: 1.2;
      margin-right: 20px;
    }

    h1 {
      font-weight: bold;
      font-size: 38px;
      margin-bottom: 20px;

      @media only screen and (min-width: 1024px) {
        font-size: 46px;
      }
    }

    p {
      color: #65717b;
      font-size: 16px;
      margin-bottom: 10px;
    }
  }

  .my-img {
    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      flex: 0.9;
      margin-left: 10px;
    }

    @media only screen and (min-width: 1024px) {
      flex: 0.8;
      margin-left: 20px;
    }

    img {
      width: 100%;
      height: auto;
      object-fit: cover;
      border-radius: 5px;
    }
  }
}

.my-works {
  h2 {
    text-align: center;
    font-size: 16px;
    font-weight: bold;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      font-size: 20px;
    }

    @media only screen and (min-width: 1024px) {
      font-size: 20px;
    }
  }

  .works {
    margin-top: 20px;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    @media only screen and (min-width: 1024px) {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }
  }
}

.my-skils {
  h2 {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
  }

  .skill {
    margin-top: 20px;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    @media only screen and (min-width: 1024px) {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .skill-item {
      @media only screen and (min-width: 768px) and (max-width: 1023px) {
        width: 31.85%;
      }

      @media only screen and (min-width: 1024px) {
        width: 31.85%;
      }
    }
  }
}
</style>