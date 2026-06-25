import UserLayout from '../layouts/userLayout.vue';

const userRouter = [
    {
        path: '/',
        component: UserLayout,
        children: [
            { path: '', name: 'home', component: () => import('../frontEnd/index.vue') },
        ]
    }
];

export default userRouter;