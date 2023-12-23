import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    authToken: null as string | null,
  }),
  actions: {
    setAuthToken(token: string | null) {
      this.authToken = token;
    },
  },
});
