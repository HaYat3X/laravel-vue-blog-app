<script setup lang="ts">
defineProps({
  ArticleSlug: String,
  FeaturedImgae: String,
  ArticleTitle: String,
  ArticleCreatedAt: String
})
</script>

<template>
  <div class="card">
    <a :href="`/${ArticleSlug}`">
      <div class="card-img">
        <img :src="FeaturedImgae" alt="">
      </div>

      <p>
        {{ ArticleTitle }}
      </p>

      <small>
        {{ ArticleCreatedAt }}
      </small>
    </a>
  </div>
</template>

<style scoped lang="scss">
.card {
  margin-bottom: 30px;

  a {
    text-decoration: none;
    color: #222222;
  }

  img {
    width: 100%;
    height: auto;
    border-radius: 5px;
    object-fit: cover;
    transition: opacity 0.3s;

    &:hover {
      opacity: 0.5;
    }
  }

  p {
    font-size: 16px;
    font-weight: bold;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
}

@media only screen and (min-width: 768px) and (max-width: 1023px) {
  .card {
    width: 48.5%;
  }
}

@media only screen and (min-width: 1024px) {
  .card {
    width: 48.5%;
  }
}
</style>