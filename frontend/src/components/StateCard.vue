<script setup lang="ts">
defineProps<{
    title: string
    value: number
}>()


</script>

<template>
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm">{{ title }}</p>
                <p class="text-3xl font-bold text-gray-800">{{ value }}</p>
            </div>
        </div>
    </div>
</template>
