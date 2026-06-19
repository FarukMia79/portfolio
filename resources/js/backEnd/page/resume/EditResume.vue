<template>
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Edit Resume</h1>
            <p class="text-gray-500 mt-1">Fill the details to edit an educational or professional entry.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <form @submit.prevent="updateResume" enctype="multipart/form-data" class="space-y-6">

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
                        <input type="text" v-model="formData.title"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            :placeholder="type === 'education' ? 'e.g. B.Sc in CSE' : 'e.g. Software Engineer'">
                        <p v-if="errors.title" class="text-red-500 text-sm">{{ errors.title[0] }}</p>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">{{ type === 'education' ? 'Institution' :
                            'Company' }}</label>
                        <input type="text" v-model="formData.institution"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            :placeholder="type === 'education' ? 'e.g. ABC University' : 'e.g. ABC Company'">
                        <p v-if="errors.institution" class="text-red-500 text-sm">{{ errors.institution[0] }}</p>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Start Date / End Date</label>
                        <input type="text" v-model="formData.period"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            placeholder="e.g. 2024 - 2026">
                        <p v-if="errors.period" class="text-red-500 text-sm">{{ errors.period[0] }}</p>
                    </div>

                    <div class="space-y-2">
                        <label v-if="type === 'education'" class="text-sm font-semibold text-gray-600">Result</label>
                        <label v-else class="text-sm font-semibold text-gray-600">Status</label>
                        <input type="text" v-model="formData.result"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                            :placeholder="type === 'education' ? 'e.g. CGPA 3.50' : 'e.g. Active'">
                        <p v-if="errors.result" class="text-red-500 text-sm">{{ errors.result[0] }}</p>
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Description / Details</label>
                    <textarea rows="4" v-model="formData.description"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"
                        placeholder="Tell us more..."></textarea>
                    <p v-if="errors.description" class="text-red-500 text-sm">{{ errors.description[0] }}</p>
                </div>

                <!-- Status Selection -->
                <div class="flex items-center gap-4">
                    <label class="text-sm font-semibold text-gray-600">Project Status</label>
                    <input type="radio" value="draft" v-model="formData.status">
                    <label class="text-sm font-semibold text-gray-600">Draft</label>
                    <input type="radio" value="published" v-model="formData.status">
                    <label class="text-sm font-semibold text-gray-600">Published</label>
                </div>

                <!-- Save Buttons -->
                <div class="flex justify-end gap-4 pt-4">
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
            formData: {
                type: '',
                title: '',
                institution: '',
                period: '',
                result: '',
                description: '',
                status: 'draft'
            },
            id: this.$route.params.id,
            type: '',
            errors: {}
        }
    },
    mounted() {
        this.getResume();
    },
    methods: {
        getResume() {
            axios.get(`/api/resumes/${this.id}`)
                .then(response => {
                    this.formData = response.data;
                    this.type = response.data.type;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        updateResume() {
            let data = new FormData();
            data.append('type', this.type);
            data.append('title', this.formData.title);
            data.append('institution', this.formData.institution);
            data.append('period', this.formData.period);
            data.append('result', this.formData.result);
            data.append('description', this.formData.description || '');
            data.append('status', this.formData.status);

            data.append('_method', 'PUT');

            axios.post(`/api/resumes/${this.id}`, data)
                .then(response => {
                    Notification.success('Resume updated successfully');
                    this.$router.push({ path: '/admin/resume' });
                })
                .catch(error => {
                    Notification.error('Failed to update resume');
                    console.log(error);
                });
            
        }
    }
}
</script>

<style scoped></style>