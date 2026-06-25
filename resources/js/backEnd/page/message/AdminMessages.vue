<template>
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Messages</h1>
            <p class="text-gray-500 mt-1">Manage all client inquiries and messages.</p>
        </div>

        <!-- Messages Container -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex h-[600px]">

            <!-- Sidebar List (Inbox) -->
            <div class="w-1/3 border-r border-gray-100 flex flex-col bg-gray-50/20">
                <div class="p-4 border-b border-gray-100 bg-gray-50 font-bold text-sm text-gray-500 uppercase">Recent
                </div>

                <div class="overflow-y-auto flex-1 custom-scrollbar">
                    <div v-for="msg in messages" :key="msg.id" @click="selectMessage(msg)" :class="[
                        'p-4 cursor-pointer hover:bg-blue-50 transition relative border-b border-gray-50',
                        selectedMessage && selectedMessage.id === msg.id ? 'bg-blue-50 border-l-4 border-blue-600' : '',
                        !msg.is_read ? 'bg-white font-bold' : 'bg-transparent opacity-70'
                    ]">
                        <!-- Unread Dot -->
                        <div v-if="!msg.is_read"
                            class="absolute left-2 top-1/2 -translate-y-1/2 w-2 h-2 bg-blue-600 rounded-full"></div>

                        <div class="pl-3">
                            <h4 class="text-gray-800 truncate">{{ msg.name }}</h4>
                            <p class="text-xs text-gray-500 truncate">{{ msg.subject }}</p>
                            <p class="text-[10px] text-gray-400 mt-1">{{ formatTime(msg.created_at) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area (2/3) -->
            <div class="w-2/3 p-8 overflow-y-auto custom-scrollbar bg-white">
                <div v-if="selectedMessage">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ selectedMessage.subject }}</h2>
                            <p class="text-sm text-gray-500">From: <span class="font-bold text-gray-700">{{
                                selectedMessage.email }}</span></p>
                            <p class="text-xs text-gray-400 mt-1">Phone: {{ selectedMessage.phone || 'N/A' }}</p>
                        </div>
                        <span class="text-xs font-bold text-gray-400 bg-gray-100 px-3 py-1 rounded-full">
                            {{ formatTime(selectedMessage.created_at) }}
                        </span>
                    </div>

                    <div
                        class="bg-gray-50 p-6 rounded-xl text-gray-600 leading-relaxed mb-8 whitespace-pre-wrap min-h-[150px]">
                        {{ selectedMessage.message }}
                    </div>

                    <div class="flex gap-4">
                        <button @click="openReply"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700 transition">Reply</button>
                        <button @click="deleteMessage(selectedMessage.id)"
                            class="px-6 py-2 bg-red-50 text-red-600 rounded-lg font-bold hover:bg-red-100 transition">Delete</button>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-else class="h-full flex flex-col items-center justify-center text-gray-400 italic">
                    <svg class="w-16 h-16 mb-4 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                        </path>
                    </svg>
                    Select a message to view details
                </div>
            </div>

        </div>

        <!-- Reply Modal -->
        <div v-if="showReplyModal"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-[100] p-6">
            <div
                class="bg-white rounded-3xl w-full max-w-lg shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200">

                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Reply to Message</h3>
                        <p class="text-xs text-gray-500 mt-1">Sending mail to: <span
                                class="font-semibold text-blue-600">{{ selectedMessage.email }}</span></p>
                    </div>
                    <button @click="showReplyModal = false"
                        class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-red-50 text-gray-400 hover:text-red-500 transition-colors text-2xl">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="p-6 space-y-4">
                    <div class="bg-blue-50/50 p-4 rounded-2xl border border-blue-100">
                        <label class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mb-1 block">Original
                            Inquiry</label>
                        <p class="text-sm text-gray-600 line-clamp-2 italic">"{{ selectedMessage.message }}"</p>
                    </div>

                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2 block ml-1">Your
                            Response</label>
                        <textarea v-model="replyText" rows="6"
                            class="w-full p-4 bg-gray-50 rounded-2xl border border-gray-200 focus:border-[#FF014F] focus:ring-4 focus:ring-[#FF014F]/5 outline-none transition-all resize-none text-gray-700"
                            placeholder="Type your reply here..."></textarea>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 bg-gray-50/50 flex justify-end gap-3 border-t border-gray-100">
                    <button @click="showReplyModal = false"
                        class="px-6 py-2.5 rounded-xl font-bold text-gray-500 hover:bg-gray-200 transition-colors">
                        Cancel
                    </button>
                    <button @click="sendReply" :disabled="loading"
                        class="px-8 py-2.5 rounded-xl font-bold bg-[#1e293b] text-white hover:bg-[#FF014F] shadow-lg shadow-gray-200 transition-all disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                        <span v-if="loading"
                            class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></span>
                        {{ loading ? 'Sending...' : 'Send Reply' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Notification from '../../../helpers/Notification';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            selectedMessage: null,
            showReplyModal: false,
            messages: [],
            replyText: '',
            loading: false
        }
    },

    methods: {
        selectMessage(msg) {
            this.selectedMessage = msg;

            // if is_read = 0
            if (!msg.is_read) {
                axios.post(`/api/contact-messages/${msg.id}/read`)
                    .then(() => {
                        msg.is_read = 1;
                    });
            }
        },

        getMessages() {
            axios.get('/api/contact-messages')
                .then(response => {
                    this.messages = response.data;
                    if (this.messages.length > 0) {
                        this.selectedMessage = this.messages[0];
                    }
                })
                .catch(error => console.log(error));
        },

        openReply() {
            this.showReplyModal = true;
        },

        sendReply() {
            if (!this.replyText) return Notification.error('Please write something');

            this.loading = true;
            axios.post(`/api/contact-messages/${this.selectedMessage.id}/reply`, {
                reply: this.replyText
            })
                .then(response => {
                    this.showReplyModal = false;
                    this.replyText = '';
                    this.loading = false;
                    Notification.success('Reply has been sent successfully.');
                })
                .catch(error => {
                    this.loading = false;
                    Notification.error('Failed to send reply');
                });
        },

        formatTime(dateString) {
            const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            return new Date(dateString).toLocaleDateString('en-US', options);
        },

        deleteMessage(id) {
            // Notification.confirm if not working, use Swal directly
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#FF014F",
                cancelButtonColor: "#333",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/api/contact-messages/' + id)
                        .then(() => {
                            this.messages = this.messages.filter(m => m.id !== id);
                            this.selectedMessage = this.messages.length > 0 ? this.messages[0] : null;
                            Notification.success('Message deleted successfully.');
                        }).catch((error) => {
                            console.log(error);
                            Notification.error('Something went wrong');
                        });
                }
            });
        }
    },

    mounted() {
        this.getMessages();
    }
}
</script>

<style scoped>
/* স্ক্রলবারকে সুন্দর করার জন্য ছোট স্টাইল */
.custom-scrollbar::-webkit-scrollbar {
    width: 5px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #cbd5e1;
}
</style>