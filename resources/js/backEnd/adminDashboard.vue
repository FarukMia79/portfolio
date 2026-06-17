<template>
    <div class="space-y-8">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Total Projects</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">12</h3>
                </div>
                <div class="p-4 bg-red-100 text-red-600 rounded-lg">💼</div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Total Messages</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">45</h3>
                </div>
                <div class="p-4 bg-blue-100 text-blue-600 rounded-lg">✉️</div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Skills Count</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">08</h3>
                </div>
                <div class="p-4 bg-green-100 text-green-600 rounded-lg">⚡</div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold tracking-wider">Page Views</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">2.4k</h3>
                </div>
                <div class="p-4 bg-purple-100 text-purple-600 rounded-lg">👁️</div>
            </div>
        </div>

        <!-- Quick Action / Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Activity Table -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Recent Messages</h3>
                <div class="space-y-4">
                    <div v-for="i in 3" :key="i"
                        class="flex items-center gap-4 p-3 border-b border-gray-50 last:border-0">
                        <div class="w-10 h-10 rounded-full bg-gray-200"></div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Faruk Mia</p>
                            <p class="text-xs text-gray-500">Need a freelance web developer...</p>
                        </div>
                        <span class="ml-auto text-xs text-gray-400">2h ago</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4">
                    <button
                        class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition">Add
                        New Project</button>
                    <button
                        class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition">Update
                        Resume</button>
                    <button
                        class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition">Manage
                        Skills</button>
                    <button
                        class="p-4 border border-dashed border-gray-300 rounded-lg hover:border-red-500 hover:text-red-500 transition">View
                        Messages</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped></style>