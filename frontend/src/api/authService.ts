import apiClient from "./ApiClient"

export const authService = {
    async login(payload: { email: string, password: string }): Promise<Response> {
        return await apiClient.post('/login', payload)
    },

    async signup(): Promise<Response> {
        return await apiClient.post('/signup');
    },

    async logout(): Promise<Response> {
        return await apiClient.post('/logout');
    }
}