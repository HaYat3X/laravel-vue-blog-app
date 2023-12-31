<template>
  <button>
    <slot />
  </button>
</template>

<style scoped lang="scss">
button {
  background-color: #3ea8ff;
  border: none;
  padding: 8px 14px;
  border-radius: 5px;
  color: #ffffff;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;

  &:hover {
    background-color: #0f83fd;
  }
}
</style>