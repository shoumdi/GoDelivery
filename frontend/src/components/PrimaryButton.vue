<template>
  <button
    :type="type"
    :disabled="disabled || loading"
    class="inline-flex items-center justify-center gap-2
           rounded-md px-4 py-2 text-sm font-semibold
           transition-colors duration-200
           focus:outline-none focus:ring-2 focus:ring-offset-2
           disabled:cursor-not-allowed disabled:opacity-60"
    :class="buttonClasses"
  >
    <!-- Loading spinner -->
    <svg
      v-if="loading"
      class="h-4 w-4 animate-spin text-white"
      viewBox="0 0 24 24"
      fill="none"
    >
      <circle
        class="opacity-25"
        cx="12"
        cy="12"
        r="10"
        stroke="currentColor"
        stroke-width="4"
      />
      <path
        class="opacity-75"
        fill="currentColor"
        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
      />
    </svg>

    <slot />
  </button>
</template>

<script setup lang="ts">
import { computed } from "vue"

const props = withDefaults(defineProps<{
  type?: "button" | "submit" | "reset"
  disabled?: boolean
  loading?: boolean
}>(), {
  type: "button",
  disabled: false,
  loading: false,
})

const buttonClasses = computed(() => {
  return props.disabled || props.loading
    ? "bg-blue-400"
    : "bg-blue-600 hover:bg-blue-700 focus:ring-blue-500"
})
</script>
