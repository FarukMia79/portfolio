<template>
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Header -->
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Settings</h1>
            <p class="text-gray-500 mt-1">Manage your website configuration and profile security.</p>
        </div>

        <!-- General Settings -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-gray-800 mb-6 border-b pb-4">General Configuration</h2>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Site Title</label>
                        <input type="text" value="Faruk Mia Portfolio"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Contact Email</label>
                        <input type="email" value="farukmia7979@gmail.com"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700">Portfolio Tagline</label>
                    <textarea rows="2"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">Full Stack Developer crafting digital experiences.</textarea>
                </div>
            </form>
        </div>

        <!-- Profile & Security -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-gray-800 mb-6 border-b pb-4">Account Security</h2>
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">New Password</label>
                        <input type="password" placeholder="Leave empty to keep current"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Confirm Password</label>
                        <input type="password" placeholder="Confirm your new password"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>
                </div>
            </form>
        </div>

        <!-- Save Action -->
        <div class="flex justify-end pt-4">
            <button
                class="px-8 py-4 rounded-xl font-bold bg-gray-900 text-white hover:bg-red-600 transition shadow-lg">Save
                All Changes</button>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped></style>