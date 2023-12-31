<script setup lang="ts">
import Button from '../elements/Button.vue';
</script>

<template>
  <header>
    <div class="header-container">
      <div class="header-logo">
        <a href="/">
          <img src="../../assets/img/logoA.png" alt="">
        </a>
      </div>

      <nav>
        <ul>
          <li>
            <a href="#">
              <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                <path
                  d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
              </svg>
            </a>
          </li>

          <li>
            <a href="#">
              <Button>
                Contact
              </Button>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>

<style scoped lang="scss">
header {
  background-color: #ffffff;
  position: fixed;
  top: 0;
  width: 100%;
  padding: 0 15px;

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
          height: auto;
        }
      }
    }

    nav {
      ul {
        list-style: none;
        display: flex;
        gap: 20px;

        li {
          display: flex;
          align-items: center;

          a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 15px;

            svg {
              height: 19px;
              width: 19px;
              fill: #333333;
            }
          }
        }
      }
    }
  }
}

@media only screen and (max-width: 767px) {
  .header-logo {
    a {
      img {
        width: 120px;
      }
    }
  }
}

@media only screen and (min-width: 768px) and (max-width: 1023px) {
  .header-logo {
    a {
      img {
        width: 130px;
      }
    }
  }
}

@media only screen and (min-width: 1024px) {
  .header-logo {
    a {
      img {
        width: 130px;
      }
    }
  }
}
</style>