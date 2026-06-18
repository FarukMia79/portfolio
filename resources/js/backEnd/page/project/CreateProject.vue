<template>
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumb & Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Add New Project</h1>
            <p class="text-gray-500 mt-1">Fill in the fields below to showcase a new project.</p>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form class="space-y-6">

                <!-- Two Column Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Project Title -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Project Title</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition"
                            placeholder="Enter title...">
                    </div>

                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Category</label>
                        <select
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition">
                            <option>Web Application</option>
                            <option>AI/ML Project</option>
                            <option>Management System</option>
                            <option>Mobile App</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Description</label>
                    <textarea rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition"
                        placeholder="Write a detailed description..."></textarea>
                </div>

                <!-- File Upload -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Project Thumbnail</label>
                    <div
                        class="border-2 border-dashed border-gray-200 rounded-2xl p-10 text-center hover:border-red-400 transition cursor-pointer bg-gray-50">
                        <div class="text-gray-400 flex flex-col items-center">
                            <svg class="w-10 h-10 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="font-medium">Click to upload thumbnail</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG up to 5MB</p>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 pt-4">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit"
                        class="px-8 py-3 rounded-xl font-bold bg-gray-900 text-white hover:bg-red-600 transition shadow-lg shadow-red-200">Publish
                        Project</button>
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