import { createRouter, createWebHistory } from 'vue-router';
import userRouter from '../router/user';
import adminRouter from '../router/admin';

const routes = [...userRouter, ...adminRouter];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router