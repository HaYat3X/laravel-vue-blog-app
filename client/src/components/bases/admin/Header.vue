<template>
  <header>
    <div class="header-container">
      <div class="header-logo">
        <router-link to="/">
          <img src="../../../assets/img/logoB.png" alt="" />
        </router-link>
      </div>
    </div>
  </header>
</template>

<style scoped lang="scss">
header {
  background-color: #31373d;
  position: fixed;
  top: 0;
  width: 100%;

  .header-container {
    max-width: 1200px;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: auto;

    .header-logo {
      a {
        display: flex;
        align-items: center;

        img {
          width: 130px;
          height: auto;
        }
      }
    }
  }
}
</style>
