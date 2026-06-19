<template>
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumb & Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Add New Project</h1>
            <p class="text-gray-500 mt-1">Fill in the fields below to showcase a new project.</p>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form @submit.prevent="submitForm" enctype="multipart/form-data" class="space-y-6">

                <!-- Two Column Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Project Title -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Project Title</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition"
                            v-model="formData.title" placeholder="Enter title...">
                        <small v-if="errors.title" class="text-red-500 text-sm">{{ errors.title[0] }}</small>

                    </div>

                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Category</label>
                        <select
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition"
                            v-model="formData.category">
                            <option value="">Select Category</option>
                            <option value="Web Application">Web Application</option>
                            <option value="AI/ML Project">AI/ML Project</option>
                            <option value="Management System">Management System</option>
                            <option value="Mobile App">Mobile App</option>
                        </select>
                        <small v-if="errors.category" class="text-red-500 text-sm">{{ errors.category[0] }}</small>
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Description</label>
                    <textarea rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 focus:ring-1 focus:ring-red-500 outline-none transition"
                        v-model="formData.description" placeholder="Write a detailed description..."></textarea>
                </div>

                <!-- File Upload -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Project Thumbnail</label>
                    <div
                        class="border-2 border-dashed border-gray-200 rounded-2xl p-10 text-center hover:border-red-400 transition cursor-pointer bg-gray-50">
                        <input type="file" @change="onImageChange" class="hidden" id="fileInput">
                        <label for="fileInput" class="cursor-pointer">
                            <div class="text-gray-400 flex flex-col items-center">
                                <img v-if="ImagePreview" :src="ImagePreview"
                                    class="w-20 h-20 mb-2 object-cover rounded-lg">
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
                    <input type="radio" v-model="formData.status" value="draft">
                    <label class="text-sm font-semibold text-gray-600">Draft</label>
                    <input type="radio" v-model="formData.status" value="Published">
                    <label class="text-sm font-semibold text-gray-600">Published</label>
                    <small v-if="errors.status" class="text-red-500 text-sm">{{ errors.status[0] }}</small>
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
import Notification from '../../../Helpers/Notification';
import axios from 'axios';
export default {
    data() {
        return {
            formData: {
                title: '',
                category: '',
                description: '',
                image: null,
                status: 'draft',
            },
            ImagePreview: null,
            errors: {},
        };
    },

    methods: {
        onImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.formData.image = file;
                this.ImagePreview = URL.createObjectURL(file);
            }
        },
        submitForm() {
            let Data = new FormData();
            Data.append('title', this.formData.title);
            Data.append('category', this.formData.category);
            Data.append('description', this.formData.description || '');
            Data.append('image', this.formData.image || '');
            Data.append('status', this.formData.status || 'draft');

            axios.post('/api/projects', Data)
                .then(response => {
                    Notification.success('Project created successfully!');
                    this.$router.push({ path: '/admin/projects' });
                })
                .catch(error => {
                    if (error.response && error.response.data.errors) {
                        this.errors = error.response.data.errors;
                    }
                    Notification.error('Error creating project!');
                    console.error('Error creating project:', error);
                });
        }
    },
}
</script>

<style scoped></style>