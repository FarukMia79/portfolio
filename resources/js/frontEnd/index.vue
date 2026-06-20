<template>
    <div class="bg-[#212428] min-h-screen text-white font-sans">

        <!-- Navbar -->
        <nav class="sticky top-0 z-50 bg-[#212428]/80 backdrop-blur-md border-b border-gray-700">
            <div class="max-w-6xl mx-auto px-6 py-6 flex justify-between items-center">
                <div class="text-2xl font-bold text-white">FARUK.</div>
                <div class="flex items-center gap-8 text-gray-300 font-medium uppercase text-sm tracking-widest">
                    <a href="#" @click.prevent="scrollToSection('home')" class="hover:text-red-500 transition">Home</a>
                    <a href="#" @click.prevent="scrollToSection('features')"
                        class="hover:text-[#FF014F] transition">Features</a>
                    <a href="#" @click.prevent="scrollToSection('portfolio')"
                        class="hover:text-[#FF014F] transition">Portfolio</a>
                    <a href="#" @click.prevent="scrollToSection('resume')"
                        class="hover:text-[#FF014F] transition">Resume</a>
                    <a href="#" @click.prevent="scrollToSection('contact')"
                        class="hover:text-[#FF014F] transition">Contact</a>
                    <a href="/uploads/files/Faruk CV.pdf" download="Faruk CV.pdf"
                        class="px-5 py-2 border border-[#FF014F] text-[#FF014F] rounded hover:bg-[#FF014F] hover:text-white transition">Download
                        CV</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="max-w-6xl mx-auto px-6 py-24 flex items-center">
            <div class="w-1/2 space-y-4">
                <h4 class="text-sm tracking-[3px] text-gray-400 uppercase">Welcome to my world</h4>
                <h1 class="text-6xl font-bold leading-[1.2]">Hi, I'm <span class="text-[#FF014F]">Faruk Mia</span>
                </h1>
                <h2 class="text-5xl font-bold h-16">
                    a <span class="text-[#FF014F]">{{ text }}</span><span class="animate-pulse">|</span>
                </h2>
                <p class="text-lg text-gray-400 leading-8 pt-4">
                    I'm a passionate Full Stack Web Developer with expertise in building modern, responsive, and
                    user-friendly web applications using Laravel and Vue.js.
                </p>
            </div>
            <div class="w-1/2 flex justify-end">
                <div
                    class="w-[400px] h-[500px] bg-[#212428] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                    <!-- আপনার ছবি এখানে দিবেন -->
                    <img src="../../../public/uploads/images/faruk-mia.png" alt="Faruk Mia" class="w-full h-full rounded-xl">
                </div>
            </div>
        </section>

        <!-- What I Do Section -->
        <section id="features" class="max-w-6xl mx-auto px-6 py-20">
            <h4 class="text-[#FF014F] text-sm tracking-[2px] uppercase">Features</h4>
            <h2 class="text-5xl font-bold mb-16">What I Do</h2>

            <div class="grid grid-cols-3 gap-8">
                <div
                    class="rounded-2xl bg-[#212428] hover:bg-[#1A1C20] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33] transition-all duration-300 group cursor-pointer">
                    <div class="p-10 hover:-translate-y-6 transition duration-600">
                        <div class="w-12 h-12 my-8 bg-gray-800 rounded-lg group-hover:bg-[#FF014F]"></div>
                        <h3 class="text-2xl font-bold mb-4 text-white group-hover:text-[#FF014F]">Backend Development
                        </h3>
                        <p class="text-gray-400 group-hover:text-gray-100 leading-7 mb-8">
                            Developing robust and scalable server-side applications using PHP and Laravel. I focus on creating secure, efficient, and maintainable code that powers modern web applications.
                        </p>
                        <a href="#"
                            class=" text-[#212428] text-xl group-hover:text-[#FF014F] transform-colors duration-300">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div
                    class="rounded-2xl bg-[#212428] hover:bg-[#1A1C20] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33] transition-all duration-300 group cursor-pointer">
                    <div class="p-10 hover:-translate-y-6 transition duration-600">
                        <div class="w-12 h-12 my-8 bg-gray-800 rounded-lg group-hover:bg-[#FF014F]"></div>
                        <h3 class="text-2xl font-bold mb-4 text-white group-hover:text-[#FF014F]">Frontend Development
                        </h3>
                        <p class="text-gray-400 group-hover:text-gray-100 leading-7 mb-8">
                            Building modern, responsive, and interactive user interfaces with Vue.js. I focus on creating intuitive designs that enhance user engagement and satisfaction.
                        </p>
                        <a href="#"
                            class=" text-[#212428] text-xl group-hover:text-[#FF014F] transform-colors duration-300">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div
                    class="rounded-2xl bg-[#212428] hover:bg-[#1A1C20] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33] transition-all duration-300 group cursor-pointer">
                    <div class="p-10 hover:-translate-y-6 transition duration-600">
                        <div class="w-12 h-12 my-8 bg-gray-800 rounded-lg group-hover:bg-[#FF014F]"></div>
                        <h3 class="text-2xl font-bold mb-4 text-white group-hover:text-[#FF014F]">Full Stack Integration
                        </h3>
                        <p class="text-gray-400 group-hover:text-gray-100 leading-7 mb-8">
                            Combining frontend and backend expertise to deliver seamless, end-to-end web applications. I ensure smooth communication between the user interface and server logic.
                        </p>
                        <a href="#"
                            class=" text-[#212428] text-xl group-hover:text-[#FF014F] transform-colors duration-300">
                            <i class="fa fa-arrow-right"></i>
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
                <button @click="activePortfolio = 'project'" :aria-selected="activePortfolio === 'project'"
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 aria-selected:text-[#FF014F] bg-[#212428] hover:bg-[#1A1C20] aria-selected:bg-[#1A1C20] aria-selected:border aria-selected:border-[#FF014F] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] hover:-translate-y-1 transition-all duration-300">
                    All Project
                </button>

                <!-- Other Tabs -->
                <button @click="activePortfolio = 'external'" :aria-selected="activePortfolio === 'external'"
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 aria-selected:text-[#FF014F] bg-[#212428] hover:bg-[#1A1C20] aria-selected:bg-[#1A1C20] aria-selected:border aria-selected:border-[#FF014F] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] hover:-translate-y-1 transition-all duration-300">External
                    Link</button>
                <button @click="activePortfolio = 'gallery'" :aria-selected="activePortfolio === 'gallery'"
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 aria-selected:text-[#FF014F] bg-[#212428] hover:bg-[#1A1C20] aria-selected:bg-[#1A1C20] aria-selected:border aria-selected:border-[#FF014F] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] hover:-translate-y-1 transition-all duration-300">Gallery</button>
                <button @click="activePortfolio = 'image'" :aria-selected="activePortfolio === 'image'"
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 aria-selected:text-[#FF014F] bg-[#212428] hover:bg-[#1A1C20] aria-selected:bg-[#1A1C20] aria-selected:border aria-selected:border-[#FF014F] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] hover:-translate-y-1 transition-all duration-300">Image</button>
                <button @click="activePortfolio = 'standard'" :aria-selected="activePortfolio === 'standard'"
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 aria-selected:text-[#FF014F] bg-[#212428] hover:bg-[#1A1C20] aria-selected:bg-[#1A1C20] aria-selected:border aria-selected:border-[#FF014F] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] hover:-translate-y-1 transition-all duration-300">Standard</button>
                <button @click="activePortfolio = 'video'" :aria-selected="activePortfolio === 'video'"
                    class="px-8 py-4 rounded-lg font-bold text-gray-400 aria-selected:text-[#FF014F] bg-[#212428] hover:bg-[#1A1C20] aria-selected:bg-[#1A1C20] aria-selected:border aria-selected:border-[#FF014F] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] hover:text-[#FF014F] hover:-translate-y-1 transition-all duration-300">Video</button>
            </div>

            <!-- Projects Grid -->
            <div v-if="activePortfolio === 'project'" class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Project -->
                
                    <div v-for="project in projects.filter(project => project.status === 'Published')" :key="project.id" 
                        class="group p-6 rounded-2xl bg-[#212428] hover:bg-[#1A1C20] shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                        <div class="mb-6 h-60 bg-gray-800 rounded-xl overflow-hidden">
                            <img :src="project.image" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-[#FF014F] text-xs font-bold uppercase tracking-wider">{{ project.category
                                }}</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-100">{{ project.title }}</h3>
                    </div>
                

            </div>
        </section>

        <!-- Resume Section -->
        <section id="resume" class="max-w-6xl mx-auto px-6 py-20 border-t border-[#1A1C20]">
            <div class="text-center mb-16">
                <h4 class="text-[#FF014F] uppercase tracking-[2px] text-sm mb-2">2+ Years of Experience</h4>
                <h2 class="text-5xl font-bold">My Resume</h2>
            </div>

            <!-- Tabs Navigation -->
            <div class="grid grid-cols-4 gap-4 mb-12">
                <button @click="activeTab = 'education'" :aria-selected="activeTab === 'education'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 transition duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20] aria-selected:border-b-2 aria-selected:border-[#FF014F]">Education</button>
                <button @click="activeTab = 'professionalSkills'" :aria-selected="activeTab === 'professionalSkills'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] transition aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20] aria-selected:border-b-2 aria-selected:border-[#FF014F]">Professional
                    Skills</button>
                <button @click="activeTab = 'experience'" :aria-selected="activeTab === 'experience'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] transition aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20]  aria-selected:border-b-2 aria-selected:border-[#FF014F]">Experience</button>
                <button @click="activeTab = 'cv'" :aria-selected="activeTab === 'cv'"
                    class="py-4 bg-[#212428] shadow-[5px_5px_10px_#181a1d,-5px_-5px_10px_#2a2e33] rounded-lg font-bold hover:-translate-y-1 duration-300 hover:bg-[#1A1C20] hover:text-[#FF014F] transition aria-selected:text-[#FF014F] aria-selected:bg-[#1A1C20]  aria-selected:border-b-2 aria-selected:border-[#FF014F]">Download
                    CV</button>
            </div>

            <!-- Content Grid -->
            <div v-if="activeTab === 'education'" class="grid md:grid-cols-2 gap-16">
                <!-- Education Column -->
                <div>
                    <h3 class="text-2xl font-bold mb-8">Education Quality</h3>
                    <div class="space-y-8">
                        <!-- Education -->
                        <div v-for="resume in resumes" :key="resume.id">
                            <div v-if="resume.type === 'education'"
                                class="p-8 bg-[#212428] hover:bg-[#1A1C20] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                                <div class="flex justify-between mb-4">
                                    <h4 class="text-xl font-bold">{{ resume.title }}</h4>
                                    <span class="bg-[#212428] px-3 py-1 rounded shadow-inner text-[#FF014F] text-sm">{{
                                        resume.result }}</span>
                                </div>
                                <p class="text-gray-400 text-sm">{{ resume.institution }} ({{ resume.period }})</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Experience Column -->
                <div>
                    <h3 class="text-2xl font-bold mb-8">Professional Experience</h3>
                    <div class="space-y-8">
                        <!-- Job 1 -->
                        <div v-for="resume in resumes" :key="resume.id">
                            <div v-if="resume.type === 'experience'"
                                class="p-8 bg-[#212428] hover:bg-[#1A1C20] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33]">
                                <h4 class="text-xl font-bold mb-2">{{ resume.title }}</h4>
                                <p class="text-[#FF014F] text-sm mb-4">{{ resume.institution }} ({{ resume.period }})
                                </p>
                                <p class="text-gray-400 text-sm">{{ resume.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Skills Section -->
            <div v-if="activeTab === 'professionalSkills'" class="max-w-6xl mx-auto py-12 px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                    <div v-for="(skillsInCategory, category) in groupedSkills" :key="category">

                        <h4 class="text-red-500 uppercase tracking-widest text-xs font-semibold mb-2">Features</h4>

                        <h2 class="text-4xl font-bold text-white mb-8">{{ category }}</h2>

                        <div v-for="skill in skillsInCategory" :key="skill.id" class="mb-8">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-300 font-bold tracking-widest text-sm">{{
                                    skill.name.toUpperCase() }}</span>
                                <span class="text-gray-400 text-sm font-semibold">{{ skill.level }}%</span>
                            </div>
                            <div class="h-2 w-full bg-[#191b1e] rounded-full shadow-[inset_0px_1px_1px_#000]">
                                <div class="h-2 bg-linear-to-l from-[#FF014F] to-[#8a2be2] rounded-full"
                                    :style="{ width: skill.level + '%' }"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div v-if="activeTab === 'experience'" class="max-w-6xl mx-auto py-12 px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16">

                    <!-- Job Experience Column -->
                    <div>
                        <h4 class="text-red-500 text-sm mb-2">2024 - 2026</h4>
                        <h2 class="text-4xl font-bold text-white mb-8">Job Experience</h2>

                        <div class="space-y-8">
                            <div v-for="resume in resumes.filter(r => r.type === 'experience')" :key="resume.id"
                                class="p-8 bg-[#212428] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33] border-l-4 border-[#FF014F]">

                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-2xl font-bold text-white">{{ resume.title }}</h3>
                                    <span
                                        class="bg-[#191b1e] text-[#FF014F] px-3 py-1 rounded text-xs font-bold uppercase tracking-wider">
                                        {{ resume.result }}
                                    </span>
                                </div>
                                <p class="text-gray-400 text-sm mb-4">{{ resume.institution }} - ({{ resume.period }})
                                </p>
                                <p class="text-gray-400 leading-7 text-sm">{{ resume.description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Second Column (Project Experience) -->
                    <div>
                        <h4 class="text-red-500 text-sm mb-2">2024 - 2026</h4>
                        <h2 class="text-4xl font-bold text-white mb-8">Project Experience</h2>

                        <div class="space-y-8">
                            <div v-for="project in projects" :key="project.id"
                                class="p-8 bg-[#212428] rounded-2xl shadow-[10px_10px_20px_#181a1d,-10px_-10px_20px_#2a2e33] border-l-4 border-[#FF014F]">
                                <h3 class="text-2xl font-bold text-white">{{ project.title }}</h3>
                                <p class="text-gray-400 text-sm mb-4">{{ project.category }}</p>
                                <p class="text-gray-400 leading-7 text-sm">{{ project.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CV Section -->
            <div v-if="activeTab === 'cv'" class="mt-12 w-full h-[800px] bg-white rounded-2xl shadow-lg">
                <!-- PDF viewer -->
                <iframe src="/uploads/files/Faruk CV.pdf" width="100%" height="100%" class="rounded-xl">
                    This browser does not support PDFs. Please download the PDF to view it:
                    <a href="/uploads/files/Faruk CV.pdf" class="text-blue-600 underline">Download PDF</a>
                </iframe>
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
                        <li><a href="#" @click.prevent="scrollToSection('features')"
                                class="hover:text-[#FF014F] transition">Features</a></li>
                        <li><a href="#" @click.prevent="scrollToSection('portfolio')"
                                class="hover:text-[#FF014F] transition">Portfolio</a></li>
                        <li><a href="#" @click.prevent="scrollToSection('resume')"
                                class="hover:text-[#FF014F] transition">Resume</a></li>
                        <li><a href="#" @click.prevent="scrollToSection('contact')"
                                class="hover:text-[#FF014F] transition">Contact</a></li>
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
export default {
    data() {
        return {
            projects: [],
            skills: [],
            resumes: [],
            text: '',
            words: ['Full Stack Developer.', 'Problem Solver.', 'Professional Coder.'],
            wordIndex: 0,
            isDeleting: false,
            speed: 150,
            activeTab: 'education',
            activePortfolio: 'project'
        };
    },
    mounted() {
        this.type();
        this.getResumes();
        this.getSkills();
        this.getProjects();
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
        },
        getSkills() {
            axios.get('/api/skills')
                .then(response => {
                    this.skills = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getProjects() {
            axios.get('/api/projects')
                .then(response => {
                    this.projects = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        type() {
            const currentWord = this.words[this.wordIndex];

            if (this.isDeleting) {
                this.text = currentWord.substring(0, this.text.length - 1);
                this.speed = 150;
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
    },
    computed: {
        groupedSkills() {
            return this.skills.reduce((acc, skill) => {
                if (!acc[skill.category]) {
                    acc[skill.category] = [];
                }
                acc[skill.category].push(skill);
                return acc;
            }, {});
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