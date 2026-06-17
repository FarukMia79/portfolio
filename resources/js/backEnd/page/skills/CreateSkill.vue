<template>
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumb & Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Create New Skill</h1>
            <p class="text-gray-500 mt-1">Fill in the fields below to showcase a new skill.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <form class="space-y-6">

                <!-- Skill Name & Category -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Skill Name</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            placeholder="e.g. Laravel">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Category</label>
                        <select
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                            <option>Frontend</option>
                            <option>Backend</option>
                            <option>Database</option>
                            <option>Design</option>
                        </select>
                    </div>
                </div>

                <!-- Proficiency Level -->
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <label class="text-sm font-bold text-gray-700">Proficiency Level</label>
                        <span class="text-sm font-bold text-red-500">85%</span>
                    </div>
                    <input type="range"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-red-600">
                </div>

                <!-- Icon Upload -->
                <div class="space-y-2">
                    <label class="text-sm font-bold text-gray-700">Skill Icon / Logo</label>
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <p class="text-sm text-gray-500">Upload SVG or PNG icon</p>
                            </div>
                            <input type="file" class="hidden">
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-4 pt-4 border-t">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit"
                        class="px-8 py-3 rounded-xl font-bold bg-gray-900 text-white hover:bg-red-600 transition shadow-lg shadow-red-200">Save
                        Skill</button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped></style>