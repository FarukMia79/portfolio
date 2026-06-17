<template>
    <div class="max-w-5xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Project</h1>
                <p class="text-gray-500 mt-1">Update your existing project details here.</p>
            </div>
            <button class="text-red-600 font-bold hover:underline">Delete Project</button>
        </div>

        <!-- Edit Form -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form class="space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Project Title</label>
                        <input type="text" value="News Portal Website"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>

                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Category</label>
                        <select
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
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
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">Dynamic news portal with full admin control...</textarea>
                </div>

                <!-- Existing Thumbnail Preview -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Current Thumbnail</label>
                    <div class="flex items-center gap-6 p-4 border border-gray-200 rounded-xl bg-gray-50">
                        <img src="https://via.placeholder.com/150" class="w-24 h-24 rounded-lg object-cover">
                        <div>
                            <p class="text-sm font-bold text-gray-700">project_image.jpg</p>
                            <button type="button" class="text-xs text-red-500 hover:underline mt-1">Change
                                Image</button>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-4 border-t">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit"
                        class="px-8 py-3 rounded-xl font-bold bg-gray-900 text-white hover:bg-red-600 transition shadow-lg shadow-gray-300">Update
                        Changes</button>
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