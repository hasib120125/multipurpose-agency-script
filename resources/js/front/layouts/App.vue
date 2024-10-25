<template>
    <div>
        <HeaderComponent v-if="!withOutHeader.includes($route.name)" />
        <div class="common_margin"></div>
        <router-view></router-view>
        <Footer v-if="!withOutFooter.includes($route.name)" />
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import HeaderComponent from '../components/shared/Header';
import Footer from '../components/shared/Footer';

const route = useRoute();

const withOutHeader = ['login'];
const withOutFooter = ['login'];

const showHeader = computed(() => !withOutHeader.includes(route.name));
const showFooter = computed(() => !withOutFooter.includes(route.name));
</script>

<style scoped>
.common_margin {
    margin: 20px;
}
</style>