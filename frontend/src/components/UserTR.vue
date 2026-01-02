<template>
    <tr class="hover:bg-gray-50 transition">
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ id }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ name }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ email }}</td>
        <td class="px-6 py-4 whitespace-nowrap">
            {{ role }}
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{ status }}</span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</button>
            <button class="text-green-600 hover:text-green-900">Activer</button>
        </td>
    </tr>
</template>

<script setup lang="ts">
defineProps<{
    id: number
    name: string
    email: string
    role: string
    status: string
}>()
</script>