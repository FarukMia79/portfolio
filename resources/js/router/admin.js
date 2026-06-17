import adminLayout from '../layouts/adminLayout.vue';

const adminRouter = [
    {
        path: '/admin',
        component: adminLayout,
        children: [
            // Admin routes will go here
        ]
    }
];

export default adminRouter;