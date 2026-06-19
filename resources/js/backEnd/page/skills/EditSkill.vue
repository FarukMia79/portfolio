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
            <form @submit.prevent="submitForm" enctype="multipart/form-data" class="space-y-6">

                <!-- Skill Name & Category -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Skill Name</label>
                        <input type="text" v-model="formData.name"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700">Category</label>
                        <select v-model="formData.category"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                            <option value="">Select Category</option>
                            <option value="Backend">Backend</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Database">Database</option>
                            <option value="Design">Design</option>
                        </select>
                    </div>
                </div>

                <!-- Proficiency Range -->
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <label class="text-sm font-bold text-gray-700">Proficiency Level</label>
                        <span class="text-sm font-bold text-red-500">{{ formData.level }}%</span>
                    </div>
                    <input type="range" v-model="formData.level"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-red-600">
                </div>

                <!-- Icon Upload -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Project Thumbnail</label>
                    <div
                        class="border-2 border-dashed border-gray-200 rounded-2xl p-10 text-center hover:border-red-400 transition cursor-pointer bg-gray-50">
                        <input type="file" @change="handleImageUpload" class="hidden" id="fileInput">
                        <label for="fileInput" class="cursor-pointer">
                            <div class="text-gray-400 flex flex-col items-center">
                                <img v-if="imagePreview" :src="imagePreview"
                                    class="w-20 h-20 mb-2 object-cover rounded-lg" alt="Current Icon">
                                <svg v-else class="w-10 h-10 mb-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="font-medium">Click to upload thumbnail</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Status Selection -->
                <div class="flex items-center gap-4">
                    <label class="text-sm font-semibold text-gray-600">Project Status</label>
                    <input v-model="formData.status" type="radio" value="draft">
                    <label class="text-sm font-semibold text-gray-600">Draft</label>
                    <input v-model="formData.status" type="radio" value="published">
                    <label class="text-sm font-semibold text-gray-600">Published</label>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end gap-4 pt-4">
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
            formData: {
                name: '',
                category: '',
                level: 80,
                icon: null,
                status: ''
            },
            id: this.$route.params.id,
            imagePreview: null,
            errors: {}
        }
    },
    methods: {
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file.size > 2 * 1024 * 1024) {
                this.errors.icon = 'File size must be less than 2MB';
                return;
            }
            this.formData.icon = file;
            this.imagePreview = URL.createObjectURL(file);
            
        },
        getSkill() {
            axios.get(`/api/skills/${this.id}`)
                .then(response => {
                    this.formData = response.data;
                    this.imagePreview = '/' + response.data.icon;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        submitForm() {
            let formData = new FormData();
            formData.append('name', this.formData.name);
            formData.append('category', this.formData.category);
            formData.append('level', this.formData.level || 80);
            if (this.formData.icon) {
                formData.append('icon', this.formData.icon);
            }
            formData.append('status', this.formData.status);

            formData.append('_method', 'PUT');

            axios.post(`/api/skills/${this.id}`, formData)
                .then(response => {
                    Notification.success('Skill updated successfully');
                    this.$router.push('/admin/skills');
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    Notification.error('Something went wrong');
                    console.log(error);
                });

        }
    },
    mounted() {
        this.getSkill();
    }
}
</script>