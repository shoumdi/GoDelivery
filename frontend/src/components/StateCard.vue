<script setup lang="ts">
defineProps<{
    title: String,
    value: Number,
}>()


</script>

<template>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">{{ title }}</p>
                <p class="text-3xl font-bold text-gray-800">{{ value }}</p>
                <p class="text-sm text-blue-600 mt-1">
                    <i class="fas fa-arrow-up"></i> +15% ce mois
                </p>
            </div>
            <div class="bg-yellow-100 p-4 rounded-full">
                <i class="fas fa-paper-plane text-yellow-600 text-2xl"></i>
            </div>
        </div>
    </div>
</template>
