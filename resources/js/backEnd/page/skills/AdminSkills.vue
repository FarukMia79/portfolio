<template>
    <div class="space-y-8">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Technical Skills</h2>
                <p class="text-gray-500 text-sm">Manage your expertise levels and technical stack.</p>
            </div>
            <router-link to="/admin/create-skill"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 shadow-lg shadow-blue-200 transition-all">
                <span class="text-lg font-bold">+</span> Create New Skill
            </router-link>
        </div>

        <!-- Skills Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div v-for="skill in skills" :key="skill.id"
                class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">

                <div class="flex justify-between items-start mb-6">
                    <div class="flex items-center gap-4">
                        <!-- Icon Placeholder -->
                        <div
                            class="w-14 h-14 rounded-xl bg-gray-50 flex items-center justify-center text-3xl border border-gray-100">
                            <img :src="skill.icon ? '/' + skill.icon : ''" alt="Skill Icon"
                                class="w-10 h-10 object-contain">
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">{{ skill.name }}</h3>
                            <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">{{ skill.category }}
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2">
                        <router-link :to="{ name: 'editSkill', params: { id: skill.id } }"
                            class="p-2 text-gray-400 hover:text-blue-600 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </router-link>
                        <button @click="deleteSkill(skill.id)" class="p-2 text-gray-400 hover:text-red-600 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="space-y-2">
                    <div class="flex justify-between text-xs font-bold text-gray-500">
                        <span>Proficiency</span>
                        <span>{{ skill.level }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2">
                        <div :class="`h-2 rounded-full transition-all duration-1000 ${skill.color}`"
                            :style="{ width: skill.level + '%' }">
                        </div>
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
            skills: []
        };
    },
    mounted() {
        this.fetchSkills();
    },
    methods: {
        fetchSkills() {
            axios.get('/api/skills')
                .then(response => {
                    this.skills = response.data;
                    this.skills.forEach(skill => {
                        skill.color = this.getSkillColor(skill.level);
                    });
                })
                .catch(error => {
                    console.error('Error fetching skills:', error);
                });
        },
        getSkillColor(level) {
            if (level >= 90) return 'bg-green-500';
            if (level >= 80) return 'bg-blue-500';
            if (level >= 70) return 'bg-red-500';
            return 'bg-yellow-500';
        },
        deleteSkill(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your skill has been deleted.",
                        icon: "success"
                    });
                    axios.delete('/api/skills/' + id)
                        .then(() => {
                            this.skills = this.skills.filter(skill => {
                                return skill.id != id;
                            });
                        }).catch((error) => {
                            console.log(error);
                        });
                }
            });
        }
    }
}
</script>