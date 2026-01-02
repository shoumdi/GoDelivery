import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { authService } from '@/api/authService';

export const useAuthStore = defineStore('auth', () => {
  const token = ref(localStorage.getItem('token'));
  const user = ref(null);

  const isAuthenticated = computed(() => !!token.value);

  async function login(email: string, password: string) {
    const data = await (await authService.login({ email, password })).json();
    token.value = data.token
    localStorage.setItem('token', data.token)

    try {
      const payload = data.token.split('.')[1]
      user.value = JSON.parse(atob(payload))
    } catch {
      user.value = null
    }
  }

  async function signup(email: string, password: string) {
    const data = await authService.login({ email, password });

  }

  async function logout() {
    token.value = null
    user.value = null
    localStorage.removeItem('token')
  }


  return {
    token,
    user,
    isAuthenticated,
    login,
    signup,
    logout
  }
})
