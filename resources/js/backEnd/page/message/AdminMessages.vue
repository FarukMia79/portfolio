<template>
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Messages</h1>
            <p class="text-gray-500 mt-1">Manage all client inquiries and messages.</p>
        </div>

        <!-- Messages Container -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex min-h-[500px]">

            <!-- Sidebar List (Inbox) -->
            <div class="w-1/3 border-r border-gray-100">
                <div class="p-4 border-b border-gray-100 bg-gray-50 font-bold text-sm text-gray-500 uppercase">Recent
                </div>
                <div class="divide-y divide-gray-100">
                    <div v-for="msg in messages" :key="msg.id" @click="selectedMessage = msg"
                        :class="['p-4 cursor-pointer hover:bg-blue-50 transition', selectedMessage.id === msg.id ? 'bg-blue-50 border-l-4 border-blue-600' : '']">
                        <h4 class="font-bold text-gray-800">{{ msg.name }}</h4>
                        <p class="text-xs text-gray-400 truncate">{{ msg.subject }}</p>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="w-2/3 p-8">
                <div v-if="selectedMessage">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ selectedMessage.subject }}</h2>
                            <p class="text-sm text-gray-500">From: <span class="font-bold text-gray-700">{{
                                selectedMessage.email }}</span></p>
                        </div>
                        <span class="text-xs font-bold text-gray-400">{{ selectedMessage.date }}</span>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl text-gray-600 leading-relaxed mb-8">
                        {{ selectedMessage.body }}
                    </div>

                    <div class="flex gap-4">
                        <button
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition" @click="openReply">Reply</button>
                        <button
                            class="px-6 py-2 bg-red-50 text-red-600 rounded-lg font-bold hover:bg-red-100 transition">Delete</button>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-else class="h-full flex items-center justify-center text-gray-400">
                    Select a message to view details
                </div>
            </div>

        </div>

        <!-- Reply Modal -->
        <div v-if="showReplyModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-6">
            <div
                class="bg-white rounded-2xl w-full max-w-lg shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-300">
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-xl font-bold">Reply to {{ selectedMessage.name }}</h3>
                    <button @click="showReplyModal = false"
                        class="text-gray-400 hover:text-gray-800 text-2xl">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="p-6 space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-400 uppercase">To</label>
                        <p class="font-bold text-gray-800">{{ selectedMessage.email }}</p>
                    </div>
                    <textarea rows="5"
                        class="w-full p-4 bg-gray-50 rounded-xl border border-gray-200 focus:border-red-500 outline-none"
                        placeholder="Write your reply here..."></textarea>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 bg-gray-50 flex justify-end gap-3">
                    <button @click="showReplyModal = false"
                        class="px-6 py-2 rounded-lg font-bold text-gray-500 hover:bg-gray-200">Cancel</button>
                    <button
                        class="px-6 py-2 rounded-lg font-bold bg-gray-900 text-white hover:bg-red-600 transition">Send
                        Reply</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedMessage: {},
            showReplyModal: false,
            messages: [
                { id: 1, name: 'John Doe', email: 'john@example.com', subject: 'Freelance Inquiry', date: '10:30 AM', body: 'Hi Faruk, I saw your portfolio and really liked your work. I need a web developer for my project.' },
                { id: 2, name: 'Sara Smith', email: 'sara@demo.com', subject: 'Collaboration', date: 'Yesterday', body: 'Would you be interested in collaborating on a new AI project?' }
            ]
        }
    },

    methods: {
        openReply() {
            this.showReplyModal = true;
        }
    },
    mounted() {
        this.selectedMessage = this.messages[0];

    }
}
</script>