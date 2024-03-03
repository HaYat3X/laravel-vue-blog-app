<script setup lang="ts">
import Header from '../../bases/admin/Header.vue'
import Footer from '../../bases/admin/Footer.vue'
import Sidebar from '@/components/bases/admin/Sidebar.vue'
</script>

<template>
  <!-- <div class="wrapper">
    <Header />

    <main>
      <Sidebar />

      <slot />
    </main>

    <Footer />
  </div> -->

  <q-layout view="hHh lpR fff">
    <Header />

    <q-page-container>
      <Sidebar />
      
      <q-page>
        <slot />
      </q-page>
    </q-page-container>

    <Footer />
  </q-layout>
</template>

<style lang="scss">
body {
  background-color: #212529;
}
</style>
