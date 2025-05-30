import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useDefaultStore = defineStore('main', () => {
    const user = ref(null)
    const universityYear = ref('2024-2025')
    // Ajoute d'autres états globaux ici si besoin
    return { user, universityYear }
})