<script setup lang="ts">
import OrderCard from '@/components/OrderCard.vue';
import StateCard from '@/components/StateCard.vue';
import TopBar from '@/components/TopBar.vue';
import { faBell, faComment, faHome, faListAlt, faTruck } from '@fortawesome/free-regular-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const orders = [
    {
        id: 1,
        reference: "Commande #001",
        date: "2024-01-15",
        status: "En attente",
        description: "Colis fragile - Électronique",
        address: "123 Rue Example, 75001 Paris",
        tags: ["Fragile", "Express"],
        offersCount: 3
    },
    {
        id: 4,
        reference: "Commande #004",
        date: "2024-01-16",
        status: "En attente",
        description: "Livraison standard",
        address: "456 Avenue Test, 69000 Lyon",
        tags: ["Standard"],
        offersCount: 1
    },
    {
        id: 5,
        reference: "Commande #005",
        date: "2024-01-16",
        status: "En attente",
        description: "Colis volumineux",
        address: "789 Boulevard Demo, 13000 Marseille",
        tags: ["Volumineux"],
        offersCount: 0
    }
];

const statsData = [
    {
        label: "Commandes disponibles",
        value: 8,
        icon: "fa-list",
        bgColor: "bg-blue-100",
        iconColor: "text-blue-600"
    },
    {
        label: "Mes offres",
        value: 5,
        icon: "fa-paper-plane",
        bgColor: "bg-yellow-100",
        iconColor: "text-yellow-600"
    },
    {
        label: "En cours",
        value: 2,
        icon: "fa-truck",
        bgColor: "bg-indigo-100",
        iconColor: "text-indigo-600"
    },
    {
        label: "Note moyenne",
        value: 4.8 / 5,
        icon: "fa-star",
        bgColor: "bg-green-100",
        iconColor: "text-green-600"
    }
];


</script>

<template>
    <!-- Navigation -->
    <TopBar title="LivraisonApp" />

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed left-0 top-16 bottom-0 overflow-y-auto z-30">
            <nav class="p-4 space-y-2">
                <a href="dashboard-livreur.html"
                    class="flex items-center space-x-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-lg font-medium">
                    <FontAwesomeIcon :icon="faHome" />
                    <span>Dashboard</span>
                </a>
                <a href="dashboard-livreur.html"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <FontAwesomeIcon :icon="faListAlt" />
                    <span>Commandes disponibles</span>
                </a>
                <a href="commandes-en-cours-livreur.html"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <FontAwesomeIcon :icon="faTruck" />
                    <span>Mes commandes en cours</span>
                </a>
                <a href="historique-notifications.html"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <FontAwesomeIcon :icon="faBell" />
                    <span>Notifications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">2</span>
                </a>
                <a href="chat.html"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <FontAwesomeIcon :icon="faComment" />
                    <span>Messages</span>
                </a>

            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Commandes disponibles</h2>
                <p class="text-gray-600">Consultez et proposez des offres pour les commandes</p>
            </div>

            <!-- Statistiques rapides -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <StateCard v-for="stat in statsData" :title="stat.label" :value="stat.value" />
            </div>

            <!-- Filtres -->
            <div class="mb-6 flex space-x-4">
                <select id="typeFilter"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <option value="">Tous les types</option>
                    <option value="standard">Standard</option>
                    <option value="fragile">Fragile</option>
                    <option value="express">Express</option>
                    <option value="volumineux">Volumineux</option>
                </select>
                <select id="statusFilter"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <option value="">Tous les statuts</option>
                    <option value="creee">Créée</option>
                    <option value="en_attente">En attente d'offres</option>
                </select>
            </div>

            <!-- Liste des commandes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <OrderCard v-for="order in orders" :reference="order.reference" :date="order.date"
                    :status="order.status" :description="order.description" :adress="order.address"
                    :offers-count="order.offersCount" :options="order.tags" />
            </div>
        </main>
    </div>

    <!-- Modal Notifications -->
    <div id="notificationModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Notifications</h3>
                <button id="closeNotificationModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6 max-h-96 overflow-y-auto">
                <div class="space-y-4">
                    <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded">
                        <p class="text-sm text-gray-800"><strong>Offre acceptée</strong></p>
                        <p class="text-xs text-gray-600 mt-1">Votre offre pour la commande #002 a été acceptée</p>
                        <p class="text-xs text-gray-500 mt-2">Il y a 2 heures</p>
                    </div>
                    <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                        <p class="text-sm text-gray-800"><strong>Commande en cours</strong></p>
                        <p class="text-xs text-gray-600 mt-1">La commande #002 est maintenant en cours de traitement</p>
                        <p class="text-xs text-gray-500 mt-2">Il y a 1 heure</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>