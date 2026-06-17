import adminLayout from '../layouts/adminLayout.vue';

const adminRouter = [
    {
        path: '/admin',
        component: adminLayout,
        children: [
            { path: '', name: 'adminDashboard', component: () => import('../backEnd/adminDashboard.vue') },
        ]
    }
];

export default adminRouter;