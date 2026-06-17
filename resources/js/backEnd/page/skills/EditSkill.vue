<template>
    <div class="max-w-5xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Skill</h1>
                <p class="text-gray-500 mt-1">Update your existing skill details here.</p>
            </div>
            <button class="text-red-600 font-bold hover:underline">Delete Skill</button>
        </div>

        <!-- Edit Form -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <form class="space-y-6">

                <!-- Skill Name & Category -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Skill Name</label>
                        <input type="text" value="Laravel"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Category</label>
                        <select
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                            <option selected>Backend</option>
                            <option>Frontend</option>
                            <option>Database</option>
                        </select>
                    </div>
                </div>

                <!-- Proficiency Range -->
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <label class="text-sm font-bold text-gray-700">Proficiency Level</label>
                        <span class="text-sm font-bold text-red-500">95%</span>
                    </div>
                    <input type="range" value="95"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-red-600">
                </div>

                <!-- Current Icon Preview -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700">Current Icon</label>
                    <div class="flex items-center gap-6 p-4 border border-gray-200 rounded-xl bg-gray-50">
                        <img src="https://via.placeholder.com/60" class="w-12 h-12 object-contain">
                        <div>
                            <p class="text-sm font-bold text-gray-700">laravel_logo.png</p>
                            <button type="button" class="text-xs text-blue-600 hover:underline mt-1">Change
                                Icon</button>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-4 border-t">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit"
                        class="px-8 py-3 rounded-xl font-bold bg-gray-900 text-white hover:bg-red-600 transition shadow-lg">Update
                        Changes</button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            skillName: 'Laravel'
        }
    }
}
</script>