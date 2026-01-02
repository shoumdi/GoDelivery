<template>
    <nav class="bg-white shadow-lg fixed top-0 left-0 right-0 z-40">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-indigo-600">LivraisonApp</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <select id="dashboardSelector" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 text-sm">
                            <option value="client" selected>Dashboard Client</option>
                            <option value="livreur">Dashboard Livreur</option>
                            <option value="admin">Dashboard Admin</option>
                        </select>
                    </div>
                    <div class="relative">
                        <button id="notificationBtn" class="relative p-2 text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-bell text-xl"></i>
                            <span id="notificationBadge" class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center hidden">3</span>
                        </button>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="profil.html" class="text-gray-700 hover:text-indigo-600 transition">Jean Dupont</a>
                        <button class="text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed left-0 top-16 bottom-0 overflow-y-auto z-30">
            <nav class="p-4 space-y-2">
                <a href="dashboard-client.html" class="flex items-center space-x-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-lg font-medium">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="dashboard-client.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Mes commandes</span>
                </a>
                <a href="historique-notifications.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">3</span>
                </a>
                <a href="chat.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-comments"></i>
                    <span>Messages</span>
                </a>
                <a href="profil.html" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-user"></i>
                    <span>Mon profil</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Mes commandes</h2>
            <p class="text-gray-600">Gérez vos commandes de livraison</p>
        </div>

        <!-- Actions -->
        <div class="mb-6 flex justify-between items-center">
            <div class="flex space-x-4">
                <button id="filterBtn" class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-filter mr-2"></i>Filtrer
                </button>
                <select id="statusFilter" class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <option value="">Tous les statuts</option>
                    <option value="creee">Créée</option>
                    <option value="en_attente">En attente d'offres</option>
                    <option value="en_cours">En cours de traitement</option>
                    <option value="expediee">Expédiée</option>
                    <option value="terminee">Terminée</option>
                    <option value="annulee">Annulée</option>
                </select>
            </div>
            <button id="newOrderBtn" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-lg">
                <i class="fas fa-plus mr-2"></i>Nouvelle commande
            </button>
        </div>

        <!-- Statistiques rapides -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Total commandes</p>
                        <p class="text-2xl font-bold text-gray-800">12</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-shopping-cart text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">En attente</p>
                        <p class="text-2xl font-bold text-gray-800">3</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-clock text-yellow-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">En cours</p>
                        <p class="text-2xl font-bold text-gray-800">2</p>
                    </div>
                    <div class="bg-indigo-100 p-3 rounded-full">
                        <i class="fas fa-truck text-indigo-600"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Terminées</p>
                        <p class="text-2xl font-bold text-gray-800">7</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-check-circle text-green-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des commandes -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adresse</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Colis fragile - Électronique</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">123 Rue Example, Paris</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">En attente</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/01/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="commande-detail.html?id=1" class="text-indigo-600 hover:text-indigo-900 mr-3">Voir</a>
                                <button class="text-red-600 hover:text-red-900">Supprimer</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#002</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Livraison express</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">456 Avenue Test, Lyon</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">En cours</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">14/01/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="commande-detail.html?id=2" class="text-indigo-600 hover:text-indigo-900 mr-3">Voir</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#003</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Colis standard</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">789 Boulevard Demo, Marseille</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Terminée</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10/01/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="commande-detail.html?id=3" class="text-indigo-600 hover:text-indigo-900">Voir</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </main>
    </div>

    <!-- Modal Nouvelle Commande -->
    <div id="newOrderModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b">
                <h3 class="text-2xl font-bold text-gray-800">Nouvelle commande</h3>
            </div>
            <form id="newOrderForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" required rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                              placeholder="Décrivez votre commande..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Adresse de livraison</label>
                    <input type="text" name="adresse" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                           placeholder="123 Rue Example, Ville">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ville</label>
                        <input type="text" name="ville" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Code postal</label>
                        <input type="text" name="code_postal" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Type de colis</label>
                    <select name="type_colis" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <option value="standard">Standard</option>
                        <option value="fragile">Fragile</option>
                        <option value="express">Express</option>
                        <option value="volumineux">Volumineux</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-4 pt-4">
                    <button type="button" id="cancelOrderBtn" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Annuler
                    </button>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        Créer la commande
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Notifications -->
    <div id="notificationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-800">Notifications</h3>
                <button id="closeNotificationModal" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6 max-h-96 overflow-y-auto">
                <div class="space-y-4">
                    <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded">
                        <p class="text-sm text-gray-800"><strong>Nouvelle offre reçue</strong></p>
                        <p class="text-xs text-gray-600 mt-1">Un livreur a envoyé une offre pour votre commande #001</p>
                        <p class="text-xs text-gray-500 mt-2">Il y a 5 minutes</p>
                    </div>
                    <div class="p-4 bg-green-50 border-l-4 border-green-500 rounded">
                        <p class="text-sm text-gray-800"><strong>Commande en cours</strong></p>
                        <p class="text-xs text-gray-600 mt-1">Votre commande #002 est maintenant en cours de traitement</p>
                        <p class="text-xs text-gray-500 mt-2">Il y a 1 heure</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>