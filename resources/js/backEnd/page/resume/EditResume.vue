<template>
    <div class="max-w-3xl mx-auto">
        <!-- Page Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Edit Entry</h1>
                <p class="text-gray-500 mt-1">Update your existing entry details here.</p>
            </div>
            <button class="text-red-600 font-bold hover:underline">Delete Entry</button>
        </div>

        <!-- Edit Form -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <form class="space-y-6">

                <!-- Entry Type (Disabled/Readonly in Edit) -->
                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                    <label class="text-xs font-bold text-gray-400 uppercase">Entry Type</label>
                    <p class="text-lg font-bold text-gray-800">Education</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Degree / Role</label>
                        <input type="text" value="B.Sc in CSE"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Institution / Company</label>
                        <input type="text" value="Green University Of Bangladesh"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Duration / Year</label>
                        <input type="text" value="2026"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Result / Status</label>
                        <input type="text" value="CGPA 2.58"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Description</label>
                    <textarea rows="4"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">Studied core computer science subjects...</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 pt-4 border-t">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit"
                        class="px-8 py-3 rounded-xl font-bold bg-gray-900 text-white hover:bg-red-600 transition shadow-lg">Update
                        Entry</button>
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