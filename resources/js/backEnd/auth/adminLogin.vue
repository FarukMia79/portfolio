<template>
    <div class="min-h-screen bg-[#212428] flex items-center justify-center p-6">
        <!-- Login Card -->
        <div class="w-full max-w-md bg-[#212428] p-10 rounded-2xl shadow-[20px_20px_60px_#181a1d,-20px_-20px_60px_#2a2e33]">
            
            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-white mb-2">Admin Login</h1>
                <p class="text-gray-400 text-sm">Welcome back, please login to your account.</p>
            </div>

            <!-- Login Form -->
            <form @submit.prevent="login" class="space-y-6">
                <!-- Email -->
                <div>
                    <label class="text-gray-400 text-xs uppercase tracking-widest font-bold mb-2 block">Email Address</label>
                    <input type="email" v-model="form.email" 
                        class="w-full p-4 bg-[#191b1e] text-white rounded-lg border border-gray-700 focus:border-[#FF014F] outline-none transition"
                        placeholder="example@mail.com">
                </div>

                <!-- Password -->
                <div>
                    <label class="text-gray-400 text-xs uppercase tracking-widest font-bold mb-2 block">Password</label>
                    <input type="password" v-model="form.password" 
                        class="w-full p-4 bg-[#191b1e] text-white rounded-lg border border-gray-700 focus:border-[#FF014F] outline-none transition"
                        placeholder="••••••••">
                </div>

                <!-- Button -->
                <button type="submit" 
                    class="w-full py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold text-[#FF014F] hover:text-white transition duration-300">
                    SIGN IN
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import AppStorage from '../../Helpers/AppStorage';
import Notification from '../../Helpers/Notification';

export default {
    data() {
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login() {
            axios.post('/api/login', this.form)
                .then(response => {
                    const token = response.data.access_token;
                    const user = response.data.user;

                    AppStorage.store(token, user);

                    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

                    Notification.success('Login successful');
                    this.$router.push('/admin');
                    
                })
                .catch(error => {
                    console.error("Login failed:", error);
                    Notification.error('Login failed');
                });
        }
    }
}
</script>