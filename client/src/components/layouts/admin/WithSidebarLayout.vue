<script setup lang="ts">
import Header from '../../bases/admin/Header.vue'
import Footer from '../../bases/admin/Footer.vue'
import Sidebar from '@/components/bases/admin/Sidebar.vue'
</script>

<template>
  <div class="wrapper">
    <Header />

    <main>
      <Sidebar />

      <slot />
    </main>

    <Footer />
  </div>
</template>

<style lang="scss">
body {
  background-color: #212529;

  main {
    margin: 120px auto 60px;
    display: flex;
  }
}
</style>
