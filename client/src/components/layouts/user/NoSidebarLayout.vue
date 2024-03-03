<script setup lang="ts">
import Header from '../../bases/user/Header.vue'
import Footer from '../../bases/user/Footer.vue'
</script>

<template>
  <q-layout view="hHh lpR fff">
    <Header />

    <q-page-container>
      <q-page>
        <slot />
      </q-page>
    </q-page-container>

    <Footer />
  </q-layout>
</template>

<style lang="scss">
body {
  background-color: #f0f7ff;

  .q-page {
    padding: 0 15px;
    margin: 30px 0;

    @media only screen and (min-width: 768px) and (max-width: 1023px) {
      padding: 0 30px;
      margin: 45px 0;
    }

    @media only screen and (min-width: 1024px) {
      max-width: 1100px;
      margin: 60px auto;
    }
  }
}
</style>
