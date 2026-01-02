<template>
    <main>
        <!-- Gestion des utilisateurs -->
        <div id="utilisateurs" class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Gestion des utilisateurs</h3>
                <div class="flex space-x-4">
                    <select id="roleFilter"
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                        <option value="">Tous les rôles</option>
                        <option value="client">Client</option>
                        <option value="livreur">Livreur</option>
                        <option value="admin">Admin</option>
                    </select>
                    <input type="text" id="searchUser" placeholder="Rechercher..."
                        class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rôle</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Statut</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <UserTR v-for="user in usersList" :id="user.id" :name="user.name" :email="user.email"
                                :role="user.role" :status="user.status" />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup lang="ts">
const usersList = [
    {
        id: 1,
        name: "Ahmed Benali",
        email: "ahmed.benali@example.com",
        role: "admin",
        status: "active"
    },
    {
        id: 2,
        name: "Sara El Mansouri",
        email: "sara.elmansouri@example.com",
        role: "livreur",
        status: "active"
    },
    {
        id: 3,
        name: "Youssef Karim",
        email: "youssef.karim@example.com",
        role: "client",
        status: "inactive"
    },
    {
        id: 4,
        name: "Nadia Zahra",
        email: "nadia.zahra@example.com",
        role: "livreur",
        status: "active"
    },
    {
        id: 5,
        name: "Omar Haddad",
        email: "omar.haddad@example.com",
        role: "client",
        status: "active"
    }
];
</script>