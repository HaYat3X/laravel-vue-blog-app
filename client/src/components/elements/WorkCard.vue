<script setup lang="ts">
defineProps({
  FeaturedImgae: String,
  WorkTitle: String,
})
</script>

<template>
  <div class="work-item">
    <a href="">
      <img :src="FeaturedImgae" alt="">

      <p>
        {{ WorkTitle }}
      </p>
    </a>
  </div>
</template>

<style scoped lang="scss">
.work-item {
  width: 31.85%;

  a {
    text-decoration: none;
  }

  img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 5px;

    &:hover {
      opacity: 0.5;
    }
  }

  p {
    text-align: center;
    color: #65717b;
    font-size: 12px;
    font-weight: bold;
    margin-top: 5px;
  }
}
</style>