<template>
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Resume Management</h2>
                <p class="text-gray-500 text-sm">Manage your educational background and work experience.</p>
            </div>
            <router-link to="/admin/create-resume"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 shadow-lg shadow-blue-200 transition-all">
                <span class="text-lg font-bold">+</span> Create New Entry
            </router-link>
        </div>

        <!-- Resume Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Education Section -->
            <div class="space-y-6">
                <h2 class="text-xl font-bold text-gray-800 border-b pb-2">Education</h2>
                <div v-for="resume in resumes" :key="resume.id">
                    <div v-if="resume.type === 'education'"
                        class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-gray-800">{{ resume.title }}</h3>
                                <p class="text-sm text-gray-500">{{ resume.institution }}</p>
                            </div>
                            <div class="flex gap-2">
                                <router-link :to="{ name: 'editResume', params: { id: resume.id } }"
                                    class="text-gray-400 hover:text-blue-600">Edit</router-link>
                                <button class="text-gray-400 hover:text-red-600">Delete</button>
                            </div>
                        </div>
                        <span class="inline-block bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">{{
                            resume.period }} | {{ resume.result }}</span>
                    </div>
                </div>

            </div>

            <!-- Experience Section -->
            <div class="space-y-6">
                <h2 class="text-xl font-bold text-gray-800 border-b pb-2">Experience</h2>
                <div v-for="resume in resumes" :key="resume.id">
                    <div v-if="resume.type === 'experience'"
                        class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-gray-800">{{ resume.title }}</h3>
                                <p class="text-sm text-gray-500">{{ resume.institution }}</p>
                            </div>
                            <div class="flex gap-2">
                                <router-link :to="{ name: 'editResume', params: { id: resume.id } }"
                                    class="text-gray-400 hover:text-blue-600">Edit</router-link>
                                <button class="text-gray-400 hover:text-red-600">Delete</button>
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">{{ resume.description }}</p>
                        <span class="inline-block bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-bold">{{
                            resume.period }}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            resumes: [],
        };
    },
    mounted() {
        this.getResumes();
    },
    methods: {
        getResumes() {
            axios.get('/api/resumes')
                .then(response => {
                    this.resumes = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>