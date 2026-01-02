<template>
  <div class="w-full">
    <!-- Label -->
    <label
      v-if="label"
      :for="label"
      class="mb-1 block text-sm font-medium text-gray-700"
    >
      {{ label }}
    </label>

    <!-- Input -->
    <input
      :type="type"
      :placeholder="placeholder"
      :value="modelValue"
      :disabled="disabled"
      @input="onInput"
      class="w-full rounded-md border px-3 py-2 text-sm shadow-sm
             focus:outline-none focus:ring-2
             disabled:bg-gray-100 disabled:cursor-not-allowed"
      :class="inputClasses"
    />

    <!-- Error -->
    <p v-if="error" class="mt-1 text-sm text-red-600">
      {{ error }}
    </p>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue"


const props = withDefaults(defineProps<{
  modelValue: string
  label?: string
  placeholder?: string
  type?: string
  error?: string
  disabled?: boolean
}>(), {
  type: "text",
  disabled: false,
})

const emit = defineEmits<{
  (e: "update:modelValue", value: string): void
}>()

const onInput = (event: Event) => {
  const target = event.target as HTMLInputElement
  emit("update:modelValue", target.value)
}


const inputClasses = computed(() => {
  return props.error
    ? "border-red-500 focus:ring-red-500"
    : "border-gray-300 focus:ring-blue-500"
})
</script>
