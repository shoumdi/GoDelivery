<script setup lang="ts">
import ConversationCard from '@/components/ConversationCard.vue';
import { faPaperPlane } from '@fortawesome/free-regular-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const conversations = [
    {
        title: "Commande #1245 – Livraison repas",
        date: "2026-01-01 14:32",
        content: "Bonjour, je suis en route. Arrivée prévue dans 10 minutes.",
        unreadMsg: 2
    },
    {
        title: "Commande #1241 – Colis fragile",
        date: "2026-01-01 13:10",
        content: "Pouvez-vous confirmer l’adresse exacte de livraison ?",
        unreadMsg: 0
    },
    {
        title: "Commande #1239 – Livraison express",
        date: "2025-12-31 18:45",
        content: "La livraison est terminée. Merci pour votre confiance !",
        unreadMsg: 1
    },
    {
        title: "Commande #1235 – Supermarché",
        date: "2025-12-31 16:20",
        content: "Je suis devant l’immeuble, pouvez-vous descendre ?",
        unreadMsg: 3
    }
];

</script>

<template>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="flex h-full">
                <!-- Liste des conversations -->
                <div class="w-1/3 border-r border-gray-200 bg-gray-50 overflow-y-auto">
                    <div class="p-4 border-b bg-white">
                        <h2 class="text-xl font-bold text-gray-800">Conversations</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <ConversationCard v-for="cnv in conversations" :title="cnv.title" :date="cnv.date"
                            :unread-msg="cnv.unreadMsg" :content="cnv.content" />
                    </div>
                </div>

                <!-- Zone de chat -->
                <div class="flex-1 flex flex-col">
                    <!-- En-tête du chat -->
                    <div class="p-4 border-b bg-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-indigo-600"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Martin Dubois</p>
                                    <p class="text-xs text-gray-500">Livreur - Commande #002</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="p-2 text-gray-600 hover:text-indigo-600">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="p-2 text-gray-600 hover:text-indigo-600">
                                    <i class="fas fa-video"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="flex-1 overflow-y-auto p-4 bg-gray-50 space-y-4">
                        <div class="flex items-start space-x-2">
                            <div
                                class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-indigo-600 text-xs"></i>
                            </div>
                            <div class="flex-1">
                                <div class="bg-white rounded-lg p-3 shadow-sm">
                                    <p class="text-sm text-gray-800">Bonjour, j'ai bien reçu votre commande. Je serai là
                                        dans environ 30 minutes.</p>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">14:25</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2 justify-end">
                            <div class="flex-1 flex justify-end">
                                <div>
                                    <div class="bg-indigo-600 text-white rounded-lg p-3 shadow-sm">
                                        <p class="text-sm">Parfait, merci ! Je serai disponible.</p>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1 text-right">14:26</p>
                                </div>
                            </div>
                            <div
                                class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-gray-600 text-xs"></i>
                            </div>
                        </div>

                        <div class="flex items-start space-x-2">
                            <div
                                class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-indigo-600 text-xs"></i>
                            </div>
                            <div class="flex-1">
                                <div class="bg-white rounded-lg p-3 shadow-sm">
                                    <p class="text-sm text-gray-800">J'arrive dans 5 minutes. Pouvez-vous me donner
                                        l'adresse exacte ?</p>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">14:28</p>
                            </div>
                        </div>
                    </div>

                    <!-- Zone de saisie -->
                    <div class="p-4 border-t bg-white">
                        <form id="chatForm" class="flex items-center space-x-2">
                            <button type="button" class="p-2 text-gray-600 hover:text-indigo-600">
                                <i class="fas fa-paperclip"></i>
                            </button>
                            <input type="text" id="messageInput" placeholder="Tapez votre message..."
                                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <button type="submit"
                                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                                <FontAwesomeIcon :icon="faPaperPlane" />
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>