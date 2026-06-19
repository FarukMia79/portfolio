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
            <form @submit.prevent="updateProject" enctype="multipart/form-data" class="space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Project Title</label>
                        <input type="text" v-model="formData.title"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                        <p v-if="errors.title" class="text-red-500 text-sm">{{ errors.title[0] }}</p>
                    </div>

                    <!-- Category -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Category</label>
                        <select v-model="formData.category"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition">
                            <option value="">Select Category</option>
                            <option value="Web Application">Web Application</option>
                            <option value="AI/ML Project">AI/ML Project</option>
                            <option value="Management System">Management System</option>
                            <option value="Mobile App">Mobile App</option>
                        </select>
                        <p v-if="errors.category" class="text-red-500 text-sm">{{ errors.category[0] }}</p>
                    </div>
                    
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Description</label>
                    <textarea rows="5" v-model="formData.description"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-red-500 outline-none transition"></textarea>
                </div>

                <!-- File Upload -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-600">Project Thumbnail</label>
                    <div
                        class="border-2 border-dashed border-gray-200 rounded-2xl p-10 text-center hover:border-red-400 transition cursor-pointer bg-gray-50">
                        <input type="file" @change="handleImageChange" class="hidden" id="fileInput">
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
                    <p v-if="errors.image" class="text-red-500 text-sm">{{ errors.image[0] }}</p>
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

                <!-- Actions -->
                <div class="flex justify-end gap-4 pt-4">
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
    data() {
        return {
            formData: {
                title: '',
                category: '',
                description: null,
                image: null,
                status: 'draft',
            },
            ImagePreview: null,
            errors: {},
            id: this.$route.params.id
        }
    },
    methods: {
        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.formData.image = file;
                this.ImagePreview = URL.createObjectURL(file);
            }
        },
        getData() {
            axios.get(`/api/projects/${this.id}`)
                .then(response => {
                    console.log("Server Response:", response.data);
                    this.formData.title = response.data.title;
                    this.formData.category = response.data.category;
                    this.formData.description = response.data.description;
                    this.ImagePreview = '/' + response.data.image;
                    this.formData.status = response.data.status;
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        },
        updateProject() {
            let Data = new FormData();
            Data.append('title', this.formData.title);
            Data.append('category', this.formData.category);
            Data.append('description', this.formData.description || '');

            if (this.formData.image) {
                Data.append('image', this.formData.image);
            }
            Data.append('status', this.formData.status || 'draft');
            Data.append('_method', 'PUT');


            axios.post(`/api/projects/${this.id}`, Data)
                .then(response => {
                    Notification.success("Project Updated!");
                    this.$router.push({ path: '/admin/projects' });
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                    Notification.error(error.response.data.message);
                });
        }

    },
    mounted() {
        this.getData();
    }


}
</script>

<style scoped></style>