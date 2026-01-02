<template>
  <div class="min-h-screen flex bg-gray-50">
    <!-- Left Illustration -->
    <div class="hidden lg:flex w-1/2 items-center justify-center">
      <div class="max-w-md px-6">
        <img src="@/assets/images/delivery_illus.svg" alt="Delivery illustration" class="w-full" />
      </div>
    </div>

    <!-- Right Form -->
    <div class="flex w-full lg:w-1/2 items-center justify-center px-4">
      <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-md">
        <!-- Header -->
        <div class="mb-6 text-center">
          <h2 class="text-2xl font-bold text-gray-800">
            Create an account
          </h2>
          <p class="mt-1 text-sm text-gray-500">
            Choose your account type to get started
          </p>
        </div>

        <!-- Form -->
        <form @submit.prevent="handleRegister" class="space-y-4">

          <!-- Name / Email / Password -->
          <TextField v-model="name" label="Full Name" placeholder="John Doe" :error="errors.name" />
          <TextField v-model="email" label="Email" type="email" placeholder="you@delivery.com" :error="errors.email" />
          <TextField v-model="password" label="Password" type="password" placeholder="••••••••"
            :error="errors.password" />


          <!-- User Type Radio Group -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
              Account Type
            </label>
            <div class="grid grid-cols-2 gap-3">
              <SelectableCard v-for="option in userTypes" :key="option.value" :title="option.label"
                :description="option.description" :selected="userType === option.value"
                @select="userType = option.value">
                <template #icon>
                  <!-- <component :is="option.icon" class="h-5 w-5" /> -->
                </template>
              </SelectableCard>
            </div>
            <p v-if="errors.userType" class="text-sm text-red-600 mt-1">
              {{ errors.userType }}
            </p>
          </div>

          <!-- Submit Button -->
          <PrimaryButton type="submit" :loading="loading" class="w-full">
            Create Account
          </PrimaryButton>
        </form>

        <!-- Login Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
          Already have an account?
          <RouterLink to="/login" class="font-medium text-blue-600 hover:text-blue-700">
            Sign in
          </RouterLink>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue"
import { RouterLink } from "vue-router"
// import { UserIcon, TruckIcon } from "@heroicons/vue/24/outline"
import TextField from "@/components/TextField.vue"
import PrimaryButton from "@/components/PrimaryButton.vue"
import SelectableCard from "@/components/SelectableCard.vue"

/* --------------------
   State
-------------------- */
type UserType = "client" | "delivery" | null

const userType = ref<UserType>(null)
const name = ref("")
const email = ref("")
const password = ref("")
const confirmPassword = ref("")
const loading = ref(false)

const errors = ref<{
  userType?: string
  name?: string
  email?: string
  password?: string
  confirmPassword?: string
}>({})

/* --------------------
   User Type Options
-------------------- */
const userTypes = [
  {
    value: "client",
    label: "Client",
    description: "Place and track deliveries",
  },
  {
    value: "delivery",
    label: "Delivery Partner",
    description: "Deliver orders and earn money",
  },
]

/* --------------------
   Methods
-------------------- */
const handleRegister = async () => {
  errors.value = {}

  if (!userType.value) errors.value.userType = "Please select an account type"
  if (!name.value) errors.value.name = "Full name is required"
  if (!email.value) errors.value.email = "Email is required"
  if (!password.value) errors.value.password = "Password is required"
  if (password.value !== confirmPassword.value) errors.value.confirmPassword = "Passwords do not match"

  if (Object.keys(errors.value).length > 0) return

  loading.value = true

  // Simulated API call
  setTimeout(() => {
    loading.value = false
    console.log("Registered user:", {
      userType: userType.value,
      name: name.value,
      email: email.value,
    })
  }, 1500)
}
</script>
