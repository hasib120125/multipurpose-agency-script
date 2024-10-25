import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        name: 'Dashboard',
        component: () => import('../pages/Dashboard.vue')
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: () => import('../pages/Dashboard.vue')
    }
];

const router = createRouter({
    history: createWebHistory('/admin'),
    routes
});

export default router;