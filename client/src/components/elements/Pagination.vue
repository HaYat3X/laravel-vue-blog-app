<script setup lang="ts">
const { currentPage, lastPage } = defineProps(['currentPage', 'lastPage']);
const emit = defineEmits();

/**
 * 現在のページを変更し、そのページに応じて記事を取得する
 * @param {number} page 
 */
const changePage = async (page: number) => {
  // 有効なページの場合のみ処理を実行
  if (page >= 1 && page <= lastPage) {
    emit('changePage', page);
  }
};
</script>

<template>
  <div class="navigation">
    <button class="prev-page" v-if="currentPage !== 1" @click="changePage(currentPage - 1)">
      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
        <path
          d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
      </svg>
      前のページへ
    </button>

    <button class="next-page" v-if="currentPage !== lastPage" @click="changePage(currentPage + 1)">
      次のページへ
      <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
        <path
          d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
      </svg>
    </button>
  </div>
</template>

<style scoped lang="scss">
.navigation {
  display: flex;
  justify-content: center;
  column-gap: 10px;

  .prev-page {
    display: flex;
    align-items: center;
    background: none;
    border: none;
    padding: 8px 14px;
    cursor: pointer;
    color: #333333;
    font-size: 14px;

    svg {
      margin-right: 8px;
      width: 12px;
      fill: #333333;
    }
  }

  .next-page {
    display: flex;
    align-items: center;
    background: #ffffff;
    border-radius: 5px;
    border: none;
    padding: 8px 14px;
    cursor: pointer;
    color: #333333;
    font-size: 14px;

    svg {
      margin-left: 8px;
      width: 12px;
      fill: #333333;
    }
  }
}
</style>