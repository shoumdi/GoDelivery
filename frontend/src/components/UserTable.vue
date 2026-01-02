<script setup>
defineProps({
  users: Array,
});

const toggleStatus = (user) => {
  user.active = !user.active;
};

const changeRole = (user, role) => {
  user.role = role;
};
</script>

<template>
  <div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">
      Gestion des utilisateurs
    </h2>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse">
        <thead>
          <tr class="bg-gray-50 text-left text-sm text-gray-600">
            <th class="p-3">Nom</th>
            <th class="p-3">Email</th>
            <th class="p-3">Rôle</th>
            <th class="p-3">Statut</th>
            <th class="p-3">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr
            v-for="user in users"
            :key="user.id"
            class="border-t text-sm"
          >
            <td class="p-3 font-medium">{{ user.name }}</td>
            <td class="p-3">{{ user.email }}</td>
            <td class="p-3">
              <select
                class="border rounded px-2 py-1"
                v-model="user.role"
                @change="changeRole(user, user.role)"
              >
                <option>Client</option>
                <option>Livreur</option>
                <option>Admin</option>
              </select>
            </td>
            <td class="p-3">
              <span
                class="px-2 py-1 rounded-full text-xs font-semibold"
                :class="user.active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'"
              >
                {{ user.active ? "Actif" : "Désactivé" }}
              </span>
            </td>
            <td class="p-3">
              <button
                class="px-3 py-1 rounded text-white text-xs"
                :class="user.active ? 'bg-red-500' : 'bg-green-500'"
                @click="toggleStatus(user)"
              >
                {{ user.active ? "Désactiver" : "Activer" }}
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
