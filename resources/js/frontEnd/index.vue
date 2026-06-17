<template>
    <div class="bg-[#212428] min-h-screen text-white font-sans">

        <!-- Navbar -->
        <nav class="sticky top-0 z-50 bg-[#212428]/80 backdrop-blur-md border-b border-gray-700">
            <div class="max-w-6xl mx-auto px-6 py-6 flex justify-between items-center">
                <div class="text-2xl font-bold text-white">FARUK.</div>
                <div class="flex gap-8 text-gray-300 font-medium uppercase text-sm tracking-widest">
                    <a href="#" @click.prevent="scrollToSection('home')" class="hover:text-red-500 transition">Home</a>
                    <a href="#" @click.prevent="scrollToSection('features')"
                        class="hover:text-[#FF014F] transition">Features</a>
                    <a href="#" @click.prevent="scrollToSection('portfolio')"
                        class="hover:text-[#FF014F] transition">Portfolio</a>
                    <a href="#" @click.prevent="scrollToSection('resume')"
                        class="hover:text-[#FF014F] transition">Resume</a>
                    <a href="#" @click.prevent="scrollToSection('contact')"
                        class="hover:text-[#FF014F] transition">Contact</a>
                    <a href="#"
                        class="px-5 py-2 border border-[#FF014F] text-[#FF014F] rounded hover:bg-[#FF014F] hover:text-white transition">BUY
                        NOW</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="max-w-6xl mx-auto px-6 py-24 flex items-center">
            <div class="w-1/2 space-y-4">
                <h4 class="text-sm tracking-[3px] text-gray-400 uppercase">Welcome to my world</h4>
                <h1 class="text-6xl font-bold leading-[1.2]">Hi, I'm <span class="text-[#FF014F]">Faruk Mia</span>
                </h1>
                <h2 class="text-4xl font-bold h-16">
                    a <span class="text-[#FF014F]">{{ text }}</span><span class="animate-pulse">|</span>
                </h2>
                <p class="text-lg text-gray-400 leading-8 pt-4">
                    Highly motivated and detail-oriented Full Stack Web Developer with a strong foundation in the
                    Laravel and Vue.js ecosystem.
                </p>
            </div>
            <div class="w-1/2 flex justify-end">
                <div
                    class="w-[400px] h-[500px] bg-[#212428] p-4 rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                    <!-- আপনার ছবি এখানে দিবেন -->
                    <div class="w-full h-full bg-gray-700 rounded-xl"></div>
                </div>
            </div>
        </section>

        <!-- What I Do Section -->
        <section id="features" class="max-w-6xl mx-auto px-6 py-20">
            <h4 class="text-[#FF014F] text-sm tracking-[2px] uppercase">Features</h4>
            <h2 class="text-5xl font-bold mb-16">What I Do</h2>

            <div class="grid grid-cols-3 gap-8">
                <div v-for="i in 3" :key="i"
                    class="p-10 rounded-2xl bg-[#212428] hover:bg-[#1A1C20] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33] transition-all duration-300 group cursor-pointer">
                    <div class="hover:-translate-y-4 transition duration-400">
                        <div class="w-12 h-12 mb-8 bg-gray-800 rounded-lg group-hover:bg-[#FF014F]"></div>
                        <h3 class="text-2xl font-bold mb-4 text-white group-hover:text-[#FF014F]">Service Title {{ i }}
                        </h3>
                        <p class="text-gray-400 group-hover:text-gray-100 leading-7">
                            Professional development with Laravel, Vue.js and modern web standards.
                        </p>
                        <a href="#" class="text-[#FF014F]">
                            <i class="feather-arrow-right text-[#FF014F]"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <section id="portfolio" class="bg-[#212428] py-20 px-6">
            <!-- Header -->
            <div class="text-center mb-16">
                <h4 class="text-[#FF014F] uppercase tracking-[2px] text-sm mb-2">Visit my portfolio and keep your
                    feedback
                </h4>
                <h2 class="text-5xl font-bold text-gray-100">My Portfolio</h2>
            </div>

            <!-- Filter Tabs (All Project Selected) -->
            <div class="flex justify-center gap-4 mb-16 flex-wrap">
                <!-- All Project (Active) -->
                <button
                    class="px-8 py-4 rounded-lg font-bold text-[#FF014F] bg-[#212428] border border-[#FF014F] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33]">
                    All Project
                </button>

                <!-- Other Tabs -->
                <button
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] transition">External
                    Link</button>
                <button
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] transition">Gallery</button>
                <button
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] transition">Image</button>
                <button
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] transition">Standard</button>
                <button
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] transition">Video</button>
            </div>

            <!-- Projects Grid -->
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Card 1: Gallery -->
                <div class="p-6 rounded-2xl bg-[#212428] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                    <div class="mb-6 h-60 bg-gray-800 rounded-xl overflow-hidden">
                        <img src="https://via.placeholder.com/400" class="w-full h-full object-cover">
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#FF014F] text-xs font-bold uppercase tracking-wider">Gallery</span>
                        <span class="text-gray-400 text-sm">❤️ 1821</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-100">NFT Dashboard Application Development.</h3>
                </div>

                <!-- Card 2: Video -->
                <div class="p-6 rounded-2xl bg-[#212428] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                    <div class="mb-6 h-60 bg-gray-800 rounded-xl flex items-center justify-center">
                        <span class="text-gray-500">Video Placeholder</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#FF014F] text-xs font-bold uppercase tracking-wider">Video</span>
                        <span class="text-gray-400 text-sm">❤️ **</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-100">Online Food Delivery Mobile App Design.</h3>
                </div>

                <!-- Card 3: External Link -->
                <div class="p-6 rounded-2xl bg-[#212428] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                    <div class="mb-6 h-60 bg-gray-800 rounded-xl overflow-hidden">
                        <img src="https://via.placeholder.com/400" class="w-full h-full object-cover">
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#FF014F] text-xs font-bold uppercase tracking-wider">External Link</span>
                        <span class="text-gray-400 text-sm">❤️ 855</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-100">Travel App Design Creativity & Application.</h3>
                </div>

            </div>
        </section>

        <!-- Resume Section -->
        <section id="resume" class="max-w-6xl mx-auto px-6 py-20 border-t border-[#1A1C20]">
            <div class="text-center mb-16">
                <h4 class="text-[#FF014F] uppercase tracking-[2px] text-sm mb-2">7+ Years of Experience</h4>
                <h2 class="text-5xl font-bold">My Resume</h2>
            </div>

            <!-- Tabs Navigation -->
            <div class="grid grid-cols-4 gap-4 mb-12">
                <button @click="activeTab = 'education'" :aria-selected="activeTab === 'education'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 transition duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20] aria-selected:border-b-2 aria-selected:border-[#FF014F]">Education</button>
                <button @click="activeTab = 'professional'" :aria-selected="activeTab === 'professional'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] transition aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20] aria-selected:border-b-2 aria-selected:border-[#FF014F]">Professional
                    Skills</button>
                <button @click="activeTab = 'experience'" :aria-selected="activeTab === 'experience'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] transition aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20]  aria-selected:border-b-2 aria-selected:border-[#FF014F]">Experience</button>
                <button @click="activeTab = 'interview'" :aria-selected="activeTab === 'interview'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] transition aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20]  aria-selected:border-b-2 aria-selected:border-[#FF014F]">Interview</button>
            </div>

            <!-- Content Grid -->
            <div class="grid md:grid-cols-2 gap-16">
                <!-- Education Column -->
                <div>
                    <h3 class="text-2xl font-bold mb-8">Education Quality</h3>
                    <div class="space-y-8">
                        <!-- Education 1 -->
                        <div
                            class="p-8 bg-[#212428] hover:bg-[#1A1C20] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                            <div class="flex justify-between mb-4">
                                <h4 class="text-xl font-bold">B.Sc in CSE</h4>
                                <span class="bg-[#212428] px-3 py-1 rounded shadow-inner text-[#FF014F] text-sm">2.58
                                    CGPA</span>
                            </div>
                            <p class="text-gray-400 text-sm">Green University Of Bangladesh (2026)</p>
                        </div>
                        <!-- Education 2 -->
                        <div
                            class="p-8 bg-[#212428] hover:bg-[#1A1C20] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                            <div class="flex justify-between mb-4">
                                <h4 class="text-xl font-bold">HSC (Alim)</h4>
                                <span class="bg-[#212428] px-3 py-1 rounded shadow-inner text-[#FF014F] text-sm">3.69
                                    GPA</span>
                            </div>
                            <p class="text-gray-400 text-sm">Palashbari Fadil Madrasha (2019)</p>
                        </div>
                    </div>
                </div>

                <!-- Experience Column -->
                <div>
                    <h3 class="text-2xl font-bold mb-8">Professional Experience</h3>
                    <div class="space-y-8">
                        <!-- Job 1 -->
                        <div
                            class="p-8 bg-[#212428] hover:bg-[#1A1C20] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                            <h4 class="text-xl font-bold mb-2">Freelance Web Developer</h4>
                            <p class="text-[#FF014F] text-sm mb-4">Self-Employed (2024 – Ongoing)</p>
                            <p class="text-gray-400 text-sm">Developing and maintaining responsive websites using
                                Laravel & custom PHP frameworks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="max-w-6xl mx-auto px-6 py-20 border-t border-[#1A1C20]">
            <div class="text-center mb-16">
                <h4 class="text-[#FF014F] uppercase tracking-[2px] text-sm mb-2">Contact</h4>
                <h2 class="text-5xl font-bold">Contact With Me</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Left: Contact Card -->
                <div class="p-8 rounded-2xl bg-[#212428] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                    <div class="overflow-hidden rounded-xl mb-6">
                        <img src="https://via.placeholder.com/400x300" class="w-full h-60 object-cover">
                    </div>
                    <h3 class="text-3xl font-bold mb-2">Md. Faruk Mia</h3>
                    <p class="text-gray-400 mb-4">Full Stack Web Developer</p>
                    <p class="text-gray-400 mb-8">I am available for freelance work. Connect with me via and call to my
                        account.</p>
                    <p class="mb-2">Phone: <span class="text-gray-300">+880 1790 647 979</span></p>
                    <p>Email: <span class="text-gray-300">farukmia7979@gmail.com</span></p>
                </div>

                <!-- Right: Contact Form -->
                <div class="p-8 rounded-2xl bg-[#212428] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                    <form class="space-y-6">
                        <div class="grid grid-cols-2 gap-6">
                            <input type="text" placeholder="YOUR NAME"
                                class="w-full p-4 bg-[#191b1e] rounded-lg border border-gray-700 focus:border-[#FF014F] outline-none">
                            <input type="text" placeholder="PHONE NUMBER"
                                class="w-full p-4 bg-[#191b1e] rounded-lg border border-gray-700 focus:border-[#FF014F] outline-none">
                        </div>
                        <input type="email" placeholder="EMAIL"
                            class="w-full p-4 bg-[#191b1e] rounded-lg border border-gray-700 focus:border-[#FF014F] outline-none">
                        <input type="text" placeholder="SUBJECT"
                            class="w-full p-4 bg-[#191b1e] rounded-lg border border-gray-700 focus:border-[#FF014F] outline-none">
                        <textarea placeholder="YOUR MESSAGE" rows="4"
                            class="w-full p-4 bg-[#191b1e] rounded-lg border border-gray-700 focus:border-[#FF014F] outline-none"></textarea>
                        <button
                            class="w-full py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold text-[#FF014F] hover:text-white transition">SEND
                            MESSAGE</button>
                    </form>
                </div>
            </div>
        </section>


        <footer class="bg-[#212428] border-t border-[#1A1C20] py-20">
            <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 text-center md:text-left">

                <!-- Logo Column -->
                <div class="space-y-4">
                    <div class="text-3xl font-bold text-white">INBIO</div>
                    <div class="flex justify-center md:justify-start gap-4">
                        <a href="#"
                            class="p-3 bg-[#191b1e] rounded shadow-[5px_5px_10px_#181a1d] hover:text-[#FF014F] hover:-translate-y-1 transition duration-300">FB</a>
                        <a href="#"
                            class="p-3 bg-[#191b1e] rounded shadow-[5px_5px_10px_#181a1d] hover:text-[#FF014F] hover:-translate-y-1 transition duration-300">IN</a>
                        <a href="#"
                            class="p-3 bg-[#191b1e] rounded shadow-[5px_5px_10px_#181a1d] hover:text-[#FF014F] hover:-translate-y-1 transition duration-300">LI</a>
                    </div>
                </div>

                <!-- Quick Link -->
                <div>
                    <h4 class="text-[#FF014F] font-bold mb-6 uppercase tracking-wider">Quick Link</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#features" class="hover:text-[#FF014F] transition">Features</a></li>
                        <li><a href="#portfolio" class="hover:text-[#FF014F] transition">Portfolio</a></li>
                        <li><a href="#resume" class="hover:text-[#FF014F] transition">Resume</a></li>
                        <li><a href="#contact" class="hover:text-[#FF014F] transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h4 class="text-[#FF014F] font-bold mb-6 uppercase tracking-wider">Resources</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-[#FF014F] transition">Authentication</a></li>
                        <li><a href="#" class="hover:text-[#FF014F] transition">System Status</a></li>
                        <li><a href="#" class="hover:text-[#FF014F] transition">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-[#FF014F] transition">Pricing</a></li>
                    </ul>
                </div>

                <!-- Developers -->
                <div>
                    <h4 class="text-[#FF014F] font-bold mb-6 uppercase tracking-wider">Developers</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-[#FF014F] transition">Documentation</a></li>
                        <li><a href="#" class="hover:text-[#FF014F] transition">Authentication</a></li>
                        <li><a href="#" class="hover:text-[#FF014F] transition">API Reference</a></li>
                        <li><a href="#" class="hover:text-[#FF014F] transition">Support</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center text-gray-500 mt-16 border-t border-[#1A1C20] pt-8">
                <p>© 2026. All rights reserved by Md. Faruk Mia</p>
            </div>
        </footer>

    </div>
</template>

<script>
import feather from 'feather-icons';
export default {
    data() {
        return {
            text: '',
            words: ['Full Stack Developer.', 'Professional Coder.', 'Problem Solver.'],
            wordIndex: 0,
            isDeleting: false,
            speed: 150,
            activeTab: 'active'
        };
    },
    mounted() {
        this.type();
        feather.replace();
    },
    methods: {
        type() {
            const currentWord = this.words[this.wordIndex];

            if (this.isDeleting) {
                this.text = currentWord.substring(0, this.text.length - 1);
                this.speed = 100;
            } else {
                this.text = currentWord.substring(0, this.text.length + 1);
                this.speed = 150;
            }

            if (!this.isDeleting && this.text === currentWord) {
                setTimeout(() => this.isDeleting = true, 2000);
            } else if (this.isDeleting && this.text === '') {
                this.isDeleting = false;
                this.wordIndex = (this.wordIndex + 1) % this.words.length;
                this.speed = 500;
            }

            setTimeout(this.type, this.speed);
        },
        scrollToSection(id) {
            const element = document.getElementById(id);
            if (element) element.scrollIntoView({ behavior: 'smooth' });
        }
    }
}
</script>

<style scoped>
html {
    scroll-behavior: smooth;
}

section {
    scroll-margin-top: 80px;
}
</style>