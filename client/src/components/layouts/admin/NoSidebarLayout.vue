<script setup lang="ts">
import Header from '../../bases/admin/Header.vue';
import Footer from '../../bases/admin/Footer.vue';
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
  background-color: #212529;

  .wrapper {
    height: 100%;
    min-height: calc(100vh - 100px);
    position: relative;
    box-sizing: border-box;
  }

  main {
    max-width: 1200px;
    margin: 120px auto 60px;
  }
}
</style>