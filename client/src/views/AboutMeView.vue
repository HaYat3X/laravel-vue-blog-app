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
        <img src="../assets/img/exsample.png" alt="">
      </div>
    </section>

    <hr>

    <section class="my-works">
      <h2>My works</h2>

      <div class="works">
        <WorkCard -featured-imgae="/src/assets/img/exsample.png" -work-title="「MY CLOSET」" />

        <WorkCard -featured-imgae="/src/assets/img/exsample.png" -work-title="「typyings」" />

        <WorkCard -featured-imgae="/src/assets/img/exsample.png" -work-title="「Real intntioN」" />

        <WorkCard -featured-imgae="/src/assets/img/exsample.png" -work-title="「Real intntioN」" />
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
  width: 900px;
  margin: 0 auto;
  padding: 60px 0;
}

.about-me {
  display: flex;

  .about {
    flex: 1;
    margin-right: 20px;

    h1 {
      font-weight: bold;
      font-size: 46px;
      margin: 30px 0;
    }

    p {
      color: #65717b;
      font-size: 16px;
    }
  }

  .my-img {
    flex: 1;
    margin-left: 20px;

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
    font-size: 20px;
    font-weight: bold;
  }

  .works {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;

    .skill-item {
      width: 31.85%;
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
    display: flex;
    flex-wrap: wrap;
    gap: 20px;

    .skill-item {
      width: 31.85%;
    }
  }
}
</style>