<template>
  <MainLayout :title="pageTitle" :menu="navMenu" :universityYear="universityYear">
    <router-view />
  </MainLayout>
</template>

<script>
import MainLayout from './MainLayout.vue'
import PlantList from './PlantList.vue'

export default {
  name: 'App',
  components: { MainLayout, PlantList },
  data() {
    return {
      pageTitle: 'Jardin Enchanté',
      navMenu: [
        { label: 'Accueil', url: '/' },
        { label: 'Plantes', url: '/plants' }
      ],
      universityYear: '2024-2025',
      plantData: [
        { id: 1, name: 'Rose', species: 'Rosa' },
        { id: 2, name: 'Tulipe', species: 'Tulipa' }
        // ... à remplacer par tes vraies données
      ]
    }
  }
}
</script>