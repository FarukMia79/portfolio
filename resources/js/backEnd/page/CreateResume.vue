<template>
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Add Resume Entry</h1>
            <p class="text-gray-500 mt-1">Fill the details to add a new educational or professional entry.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <form class="space-y-6">

                <!-- Type Selection -->
                <div>
                    <label class="text-sm font-bold text-gray-700 mb-2 block">Entry Type</label>
                    <div class="flex gap-4">
                        <button type="button" @click="type = 'education'"
                            :class="['flex-1 py-3 rounded-xl font-bold transition', type === 'education' ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600']">Education</button>
                        <button type="button" @click="type = 'experience'"
                            :class="['flex-1 py-3 rounded-xl font-bold transition', type === 'experience' ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-600']">Experience</button>
                    </div>
                </div>

                <!-- Dynamic Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">{{ type === 'education' ? 'Degree Name' :
                            'Job Role' }}</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            placeholder="e.g. B.Sc in CSE">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">{{ type === 'education' ? 'Institution' :
                            'Company' }}</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            placeholder="e.g. Green University">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Start Date / End Date</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            placeholder="e.g. 2024 - 2026">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Result / Status</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            placeholder="e.g. CGPA 3.50">
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Description / Details</label>
                    <textarea rows="4"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                        placeholder="Tell us more..."></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 pt-4 border-t">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">Cancel</button>
                    <button type="submit"
                        class="px-8 py-3 rounded-xl font-bold bg-gray-900 text-white hover:bg-red-600 transition shadow-lg">Save
                        Entry</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            type: 'education'
        }
    }
}
</script>

<style scoped></style>