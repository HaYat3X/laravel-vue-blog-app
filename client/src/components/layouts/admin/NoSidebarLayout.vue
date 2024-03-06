<script setup lang="ts">
import Header from '../../bases/admin/Header.vue'
import Footer from '../../bases/admin/Footer.vue'
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
    max-width: 1200px;
    margin: 60px auto;
  }
}
</style>
