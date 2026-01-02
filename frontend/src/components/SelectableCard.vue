<template>
  <button
    type="button"
    @click="emit('select')"
    class="w-full flex flex-col items-start rounded-lg border p-3 text-left transition
           focus:outline-none focus:ring-2 focus:ring-blue-500 flex items-center gap-2"
    :class="selected
      ? 'border-blue-600 bg-blue-50'
      : 'border-gray-300 hover:border-blue-400'"
  >
    <!-- Icon -->
    <div
      class="flex h-10 w-10 items-center justify-center rounded-full"
      :class="selected ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600'"
    >
      <slot name="icon">
        🚚
      </slot>
    </div>

    <div>
      <h3 class="text-sm font-semibold text-gray-800">
        {{ title }}
      </h3>
      <p v-if="description" class="text-sm text-gray-500">
        {{ description }}
      </p>
    </div>
  </button>
</template>

<script setup lang="ts">

defineProps<{
  title: string
  description?: string
  selected: boolean
}>()

const emit = defineEmits<{
  (e: "select"): void
}>()
</script>
