<template>
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Project Management</h2>
                <p class="text-gray-500 text-sm">Manage your portfolio projects and details.</p>
            </div>
            <router-link to="/admin/create-project"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 shadow-lg shadow-blue-200 transition-all">
                <span class="text-lg font-bold">+</span> Create New Project
            </router-link>
        </div>

        <!-- Data Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-bold tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Project Info</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr v-for="project in projects" :key="project.id" class="hover:bg-blue-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img :src="project.image ? '/' + project.image : ''"
                                    class="w-14 h-14 rounded-lg object-cover border border-gray-100 shadow-sm">
                                <div>
                                    <h4 class="font-bold text-gray-800">{{ project.title }}</h4>
                                    <p class="text-xs text-gray-400">Created: {{ new
                                        Date(project.created_at).toLocaleDateString() }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">{{
                                project.category }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-2 text-green-600 font-medium text-sm"
                                :class="project.status === 'draft' ? 'text-red-600' : 'text-green-600'">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"
                                    :class="project.status === 'draft' ? 'bg-red-500' : 'bg-green-500'"></span> {{
                                project.status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <router-link :to="{ name: 'editProject', params: { id: project.id } }"
                                    class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition">
                                    <!-- Edit Icon -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </router-link>
                                <button @click="deleteProject(project.id)"
                                    class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                    <!-- Delete Icon -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            projects: []
        };
    },
    mounted() {
        this.fetchProjects();
    },
    methods: {
        fetchProjects() {
            axios.get('/api/projects')
                .then(response => {
                    this.projects = response.data;
                })
                .catch(error => {
                    console.error('Error fetching projects:', error);
                });
        },
        deleteProject(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    axios.delete('/api/projects/' + id)
                        .then(() => {
                            this.projects = this.projects.filter(project => {
                                return project.id != id;
                            });
                        }).catch((error) => {
                            console.log(error);
                        });
                }
            });

        }
    }
}
</script>