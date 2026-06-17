import adminLayout from '../layouts/adminLayout.vue';

const adminRouter = [
    {
        path: '/admin',
        component: adminLayout,
        children: [
            { path: '', name: 'adminDashboard', component: () => import('../backEnd/adminDashboard.vue') },
            { path: 'projects', name: 'adminProjects', component: () => import('../backEnd/page/AdminProjects.vue') },
            { path: 'create-project', name: 'createProject', component: () => import('../backEnd/page/CreateProject.vue') },
            { path: 'edit-project/:id', name: 'editProject', component: () => import('../backEnd/page/EditProject.vue') },
            { path: 'skills', name: 'adminSkills', component: () => import('../backEnd/page/skills/AdminSkills.vue') },
            { path: 'create-skill', name: 'createSkill', component: () => import('../backEnd/page/skills/CreateSkill.vue') },
            { path: 'edit-skill/:id', name: 'editSkill', component: () => import('../backEnd/page/skills/EditSkill.vue') },
            { path: 'resume', name: 'adminResume', component: () => import('../backEnd/page/AdminResume.vue') },
            { path: 'create-resume', name: 'createResume', component: () => import('../backEnd/page/CreateResume.vue') },
            { path: 'edit-resume/:id', name: 'editResume', component: () => import('../backEnd/page/EditResume.vue') },
            { path: 'messages', name: 'adminMessages', component: () => import('../backEnd/page/message/AdminMessages.vue') },
            { path: 'settings', name: 'adminSettings', component: () => import('../backEnd/page/setting/AdminSettings.vue') },
        ]
    }
];

export default adminRouter;