<template>
  <!-- <header>
    <div class="header-container">
      <div class="header-logo">
        <router-link to="/">
          <img src="../../../assets/img/logo.png" alt="" />
        </router-link>
      </div>
    </div>
  </header> -->

  <q-header elevated>
    <q-toolbar>
      <q-toolbar-title>
        <a href="/">
          <q-avatar class="logo">
            <img src="../../../assets/img/logo.png" />
          </q-avatar>
        </a>
      </q-toolbar-title>
    </q-toolbar>
  </q-header>
</template>

<style scoped lang="scss">
.q-header {
  background-color: #ffffff;
  padding: 5px 0;

  @media only screen and (min-width: 1024px) {
    .q-toolbar {
      max-width: 1200px;
      margin: 0 auto;
    }
  }

  .logo {
    width: 100px;
    border-radius: 0%;

    @media only screen and (min-width: 1024px) {
      width: 110px;
    }
  }
}
</style>
