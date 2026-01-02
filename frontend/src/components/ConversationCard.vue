<template>
    <div class="p-4 hover:bg-indigo-50 cursor-pointer transition bg-white">
        <div class="flex items-center justify-between mb-2">
            <p class="font-semibold text-gray-800">{{ title }}</p>
            <span class="text-xs text-gray-500">{{ date }}</span>
        </div>
        <div class="flex items-center justify-between gap-2">
            <p class="text-sm text-gray-600 truncate">{{ content }}</p>
            <span v-if="unreadMsg > 0"
                class="inline-block mt-2 px-2 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs">{{ unreadMsg
                }}</span>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    title: string
    date: string
    content: string
    unreadMsg: number
}>()
</script>