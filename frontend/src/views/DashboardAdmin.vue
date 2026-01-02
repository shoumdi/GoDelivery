<script setup>
import { ref, onMounted } from "vue";
import StateCard from "@/components/StateCard.vue";
import UserTable from "@/components/UserTable.vue";
import TopBar from "@/components/TopBar.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faChartBar, faHome } from "@fortawesome/free-regular-svg-icons";
import { faUsers } from "@fortawesome/free-solid-svg-icons/faUsers";
import UserTR from "@/components/UserTR.vue";

// Fake data (à remplacer par API)
const stats = ref({
    totalOrders: 124,
    completedOrders: 82,
    cancelledOrders: 18,
    totalOffers: 210,
    activeCouriers: 12,
});

const users = ref([
    { id: 1, name: "Alice Martin", email: "alice@mail.com", role: "Client", active: true },
    { id: 2, name: "Bob Dupont", email: "bob@mail.com", role: "Livreur", active: false },
    { id: 3, name: "Admin Root", email: "admin@mail.com", role: "Admin", active: true },
]);

const states = [{
    title: "Commandes créées",
    value: "33"
},
{
    title: "Commandes terminées",
    value: "54"
}, {
    title: "Commandes annulées",
    value: "4"
},
{
    title: "Commandes envoyées",
    value: "104"
},
]

onMounted(() => {
    // fetch admin data here
});
</script>

<template>
    <!-- Navigation -->
    <TopBar title="LivraisonApp - Admin" />
    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed left-0 top-16 bottom-0 overflow-y-auto z-30">
            <nav class="p-4 space-y-2">
                <a href="dashboard-admin.html"
                    class="flex items-center space-x-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-lg font-medium">
                    <FontAwesomeIcon :icon="faHome" />
                    <span>Dashboard</span>
                </a>
                <a href="dashboard-admin.html#statistiques"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <FontAwesomeIcon :icon="faChartBar" />
                    <span>Statistiques</span>
                </a>
                <a href="dashboard-admin.html#utilisateurs"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <FontAwesomeIcon :icon="faUsers" />
                    <span>Gestion utilisateurs</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Tableau de bord administrateur</h2>
                <p class="text-gray-600">Supervision et gestion de la plateforme</p>
            </div>

            <!-- Statistiques -->
            <div id="statistiques" class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Statistiques globales</h3>
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <li v-for="state in states">
                        <StateCard :title="state.title" :value="state.value" />
                    </li>
                </ul>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-4">Livreurs actifs</h4>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Martin Dubois</p>
                                        <p class="text-sm text-gray-600">12 commandes ce mois</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                    Actif
                                </span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Sophie Martin</p>
                                        <p class="text-sm text-gray-600">8 commandes ce mois</p>
                                    </div>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                    Actif
                                </span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Pierre Durand</p>
                                        <p class="text-sm text-gray-600">5 commandes ce mois</p>
                                    </div>
                                </div>
                                <span
                                    class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">
                                    Inactif
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-4">Répartition des statuts</h4>
                        <div class="space-y-3">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm text-gray-600">Terminées</span>
                                    <span class="text-sm font-semibold text-gray-800">82%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 82%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm text-gray-600">En cours</span>
                                    <span class="text-sm font-semibold text-gray-800">10%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-indigo-500 h-2 rounded-full" style="width: 10%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm text-gray-600">Annulées</span>
                                    <span class="text-sm font-semibold text-gray-800">8%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-red-500 h-2 rounded-full" style="width: 8%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button
                                class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                <i class="fas fa-download mr-2"></i>Exporter en CSV
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
