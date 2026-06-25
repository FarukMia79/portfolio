<template>
    <div class="space-y-8">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Total Projects -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Total Projects</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ stats.projects_count }}</h3>
                </div>
                <div class="p-4 bg-red-100 text-red-600 rounded-lg">💼</div>
            </div>

            <!-- Card 2: Total Messages -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Total Messages</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ stats.messages_count }}</h3>
                </div>
                <div class="p-4 bg-blue-100 text-blue-600 rounded-lg">✉️</div>
            </div>

            <!-- Card 3: Skills Count -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Skills Count</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ stats.skills_count }}</h3>
                </div>
                <div class="p-4 bg-green-100 text-green-600 rounded-lg">⚡</div>
            </div>

            <!-- Card 4: Page Views -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Page Views</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ stats.page_views }}</h3>
                </div>
                <div class="p-4 bg-purple-100 text-purple-600 rounded-lg">👁️</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Messages -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Recent Messages</h3>
                <div class="space-y-4">
                    <div v-for="msg in stats.recent_messages" :key="msg.id"
                        class="flex items-center gap-4 p-3 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition rounded-lg">
                        <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center font-bold text-blue-600">
                            {{ msg.name.charAt(0) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-gray-800 truncate">{{ msg.name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ msg.message }}</p>
                        </div>
                        <span class="text-[10px] text-gray-400 whitespace-nowrap">{{ formatTime(msg.created_at) }}</span>
                    </div>
                    <div v-if="stats.recent_messages && stats.recent_messages.length === 0" class="text-center text-gray-400 py-4">
                        No messages found.
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4">
                    <router-link to="/admin/projects" class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition text-center font-semibold text-sm">Add New Project</router-link>
                    <router-link to="/admin/resume" class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition text-center font-semibold text-sm">Update Resume</router-link>
                    <router-link to="/admin/skills" class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition text-center font-semibold text-sm">Manage Skills</router-link>
                    <router-link to="/admin/messages" class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition text-center font-semibold text-sm">View Messages</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            stats: {
                projects_count: 0,
                skills_count: 0,
                messages_count: 0,
                page_views: '0',
                recent_messages: []
            }
        }
    },
    methods: {
        getDashboardData() {
            axios.get('/api/dashboard-stats')
                .then(response => {
                    this.stats = response.data;
                })
                .catch(error => {
                    console.error("Dashboard data fetch error:", error);
                });
        },
        formatTime(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
        }
    },
    mounted() {
        this.getDashboardData();
    }
}
</script>