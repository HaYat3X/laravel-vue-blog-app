<script setup lang="ts">
import NoSidebarLayout from '@/components/layouts/NoSidebarLayout.vue';
import WithSidebarLayout from '@/components/layouts/WithSidebarLayout.vue';
</script>

<template>
    <NoSidebarLayout>
        <h1>mainタグ内に配置される</h1>
    </NoSidebarLayout>

    <WithSidebarLayout>
        <h1>記事A</h1>
        <h1>記事A</h1>
    </WithSidebarLayout>
</template>