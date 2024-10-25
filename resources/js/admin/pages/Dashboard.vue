<template>
    <p>Home</p>
</template>

<script setup>
import { storeToRefs } from 'pinia';
import { useUserStore } from '../stores/user';

const userStore = useUserStore();
const { user } = storeToRefs(userStore);
</script>

<style scoped>
</style>
