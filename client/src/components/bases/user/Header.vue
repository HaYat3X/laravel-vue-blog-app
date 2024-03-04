<template>
  <q-header elevated>
    <q-toolbar>
      <q-toolbar-title>
        <a href="/">
          <q-avatar class="logo">
            <img src="../../../assets/img/logo.png" />
          </q-avatar>
        </a>
      </q-toolbar-title>

      <a href="/search" class="search-icon">
        <q-icon name="search" color="dark" size="md" />
      </a>

      <a href="/contact/submit">
        <q-btn label="contact" />
      </a>
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

  .search-icon {
    margin-right: 10px;
    margin-top: 3px;
  }

  a {
    text-decoration: none;
    color: #ffffff;
  }

  .q-btn {
    background-color: #3ea8ff;
  }
}
</style>
