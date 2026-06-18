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
                                <img :src="project.image"
                                    class="w-14 h-14 rounded-lg object-cover border border-gray-100 shadow-sm">
                                <div>
                                    <h4 class="font-bold text-gray-800">{{ project.title }}</h4>
                                    <p class="text-xs text-gray-400">Created: {{ project.date }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">{{
                                project.category }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-2 text-green-600 font-medium text-sm">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> Published
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <router-link :to="{ name: 'editProject', params: { id: project.id } }" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition">
                                    <!-- Edit Icon -->
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </router-link>
                                <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
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
            projects: [
                { id: 1, title: 'News Portal Website', category: 'Web App', image: 'https://via.placeholder.com/150', date: '12 June, 2026' },
                { id: 2, title: 'E-Commerce with AI', category: 'AI/ML', image: 'https://via.placeholder.com/150', date: '10 June, 2026' }
            ]
        };
    }
}
</script>