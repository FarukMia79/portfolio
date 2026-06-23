import { createRouter, createWebHistory } from 'vue-router';
import userRouter from '../router/user';
import adminRouter from '../router/admin';
import AppStorage from '../Helpers/AppStorage';

const routes = [...userRouter, ...adminRouter];

const router = createRouter({
    history: createWebHistory(),
    routes,
})

// Navigation Guard
router.beforeEach((to, from, next) => {
    const isAuthenticated = !!AppStorage.getToken(); // Check if token exists (true/false)

    // ১. Require authentication (requiresAuth)
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!isAuthenticated) {
            // if not authenticated, redirect to login
            next({ name: 'adminLogin' });
        } else {
            next(); // if authenticated, allow access
        }
    } 
    // ২. if route is for guests only (e.g., Login Page)
    else if (to.matched.some(record => record.meta.guest)) {
        if (isAuthenticated) {
            // if already logged in, redirect to dashboard
            next({ name: 'adminDashboard' });
        } else {
            next(); // if not logged in, allow access to login page
        }
    } 
    // ৩. Public route - allow access
    else {
        next();
    }
});

export default router