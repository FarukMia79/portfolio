<template>
    <div class="flex min-h-screen bg-[#F3F4F6]">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#1E293B] text-white flex flex-col shadow-xl">
            <div class="p-6 text-center border-b border-gray-700">
                <h1 class="text-2xl font-bold tracking-widest text-red-500">ADMIN.</h1>
            </div>

            <nav class="flex-1 p-4 space-y-2 mt-4">
                <router-link to="/admin"
                    class="flex items-center gap-3 py-3 px-4 rounded hover:bg-gray-700 transition">Dashboard</router-link>
                <router-link to="/admin/projects"
                    class="flex items-center gap-3 py-3 px-4 rounded hover:bg-gray-700 transition">Projects</router-link>
                <router-link to="/admin/skills"
                    class="flex items-center gap-3 py-3 px-4 rounded hover:bg-gray-700 transition">Skills</router-link>
                <router-link to="/admin/resume"
                    class="flex items-center gap-3 py-3 px-4 rounded hover:bg-gray-700 transition">Resume</router-link>
                <router-link to="/admin/messages"
                    class="flex items-center gap-3 py-3 px-4 rounded hover:bg-gray-700 transition">Messages</router-link>
                <router-link to="/admin/settings"
                    class="flex items-center gap-3 py-3 px-4 rounded hover:bg-gray-700 transition">Settings</router-link>
            </nav>

            <div class="p-4 border-t border-gray-700">
                <button @click="logout"
                    class="flex w-full items-center gap-3 py-3 px-4 rounded bg-red-900/30 text-red-400 hover:bg-red-600 hover:text-white transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Logout
                </button>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8 shadow-sm">
                <h2 class="text-xl font-semibold text-gray-800">Overview</h2>
                <div class="flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-sm font-bold text-gray-700">Faruk Mia</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Faruk+Mia" class="w-10 h-10 rounded-full border">
                </div>
            </header>

            <!-- Content -->
            <main class="p-8">
                <router-view />
            </main>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped></style>