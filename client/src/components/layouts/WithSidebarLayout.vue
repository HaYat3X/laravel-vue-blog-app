<script setup lang="ts">
import Header from '../bases/Header.vue';
import Footer from '../bases/Footer.vue';
import Sidebar from '../bases/Sidebar.vue';
</script>

<template>
  <div class="wrapper">
    <Header />

    <main>
      <div class="content-area">
        <slot />
      </div>

      <Sidebar />
    </main>

    <Footer />
  </div>
</template>

<style lang="scss">
body {
  background-color: #f0f7ff;

  .wrapper {
    min-height: 100%;
    box-sizing: border-box;
  }

  main {
    padding: 0 15px;
    margin: 110px auto 50px;
  }

  @media only screen and (min-width: 768px) and (max-width: 1023px) {
    main {
      padding: 0 40px;
      margin: 120px auto 60px;
    }
  }

  @media only screen and (min-width: 1024px) {
    main {
      max-width: 1100px;
      display: flex;
      gap: 30px;
      margin: 120px auto 60px;

      .content-area {
        width: calc(100% - 300px);
      }
    }
  }
}
</style>