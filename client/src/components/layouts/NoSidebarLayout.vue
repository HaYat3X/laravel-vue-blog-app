<script setup lang="ts">
import Header from '../bases/Header.vue';
import Footer from '../bases/Footer.vue';
</script>

<template>
  <div class="wrapper">
    <Header />

    <main>
      <slot />
    </main>

    <Footer />
  </div>
</template>

<style lang="scss">
body {
  background-color: #f0f7ff;

  .wrapper {
    height: 100%;
    min-height: calc(100vh - 100px);
    position: relative;
    box-sizing: border-box;
  }

  main {
    padding: 0 15px;
    margin: 105px auto 45px;
  }
}
</style>