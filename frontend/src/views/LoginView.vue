<template>
  <div class="min-h-screen flex bg-gray-50">
    <!-- Left Side (Brand / Info) -->
    <div class="hidden lg:flex w-1/2 items-center justify-center text-white">
      <div class="max-w-md text-center px-6">
        <img 
          class="w-full h-full"
          :src="deliveryIllus" 
          alt="delivery_illus"/>
      </div>
    </div>

    <!-- Right Side (Login Form) -->
    <div class="flex w-full lg:w-1/2 items-center justify-center px-4">
      <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-md">
        <!-- Header -->
        <div class="mb-6 text-center">
          <h2 class="text-2xl font-bold text-gray-800">
            Sign in
          </h2>
          <p class="mt-1 text-sm text-gray-500">
            Access your delivery dashboard
          </p>
        </div>

        <!-- Form -->
        <form @submit.prevent="handleLogin" class="space-y-4">
          <TextField
            v-model="email"
            label="Email"
            placeholder="you@delivery.com"
            type="email"
            :error="errors.email"
          />

          <TextField
            v-model="password"
            label="Password"
            placeholder="••••••••"
            type="password"
            :error="errors.password"
          />

          <PrimaryButton
            type="submit"
            :loading="loading"
            class="w-full"
          >
            Sign In
          </PrimaryButton>
        </form>

        <!-- Register Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
          Don’t have an account?
          <RouterLink
            to="/signup"
            class="font-medium text-blue-600 hover:text-blue-700"
          >
            Signup
          </RouterLink>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue"
import { RouterLink } from "vue-router"
import deliveryIllus from "@/assets/images/delivery_illus.svg"
import TextField from "@/components/TextField.vue"
import PrimaryButton from "@/components/PrimaryButton.vue"
import { useAuthStore } from "@/stores/auth"

const email = ref<string>("")
const password = ref<string>("")
const loading = ref<boolean>(false)

const auth = useAuthStore();

const errors = ref<{
  email?: string
  password?: string
}>({})

const handleLogin = async () => {
  errors.value = {}

  if (!email.value) {
    errors.value.email = "Email is required"
  }

  if (!password.value) {
    errors.value.password = "Password is required"
  }

  if (Object.keys(errors.value).length > 0) return

  loading.value = true

  // Simulated API call
  auth.login(email.value,password.value);
}
</script>
