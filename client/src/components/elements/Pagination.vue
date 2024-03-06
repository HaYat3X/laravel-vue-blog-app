<script setup lang="ts">
const { currentPage, lastPage } = defineProps(['currentPage', 'lastPage'])
const emit = defineEmits()

/**
 * 現在のページを変更し、そのページに応じて記事を取得する
 * @param {number} page
 */
const changePage = async (page: number) => {
  // 有効なページの場合のみ処理を実行
  if (page >= 1 && page <= lastPage) {
    emit('changePage', page)
  }
}
</script>

<template>
  <div class="navigation">
    <q-btn
      class="prev-page"
      size="sm"
      icon="arrow_back"
      label="前のページへ"
      v-if="currentPage !== 1"
      @click="changePage(currentPage - 1)"
    />

    <q-btn
      class="next-page"
      size="sm"
      icon-right="arrow_forward"
      label="次のページへ"
      v-if="currentPage !== lastPage"
      @click="changePage(currentPage + 1)"
    />
  </div>
</template>

<style scoped lang="scss">
.navigation {
  display: flex;
  justify-content: center;
  column-gap: 10px;

  .prev-page {
    background-color: #ffffff;
    color: #333333;
  }

  .next-page {
    background-color: #3ea8ff;
    color: #ffffff;
  }
}
</style>
