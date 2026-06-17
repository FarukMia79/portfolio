import userLayout from '../layouts/userLayout.vue';

const userRouter = [
    {
        path: '/',
        component: userLayout,
        children: [
            { path: '', name: 'home', component: () => import('../frontEnd/index.vue') },
        ]
    }
];

export default userRouter;