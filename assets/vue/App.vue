<template>
  <MainLayout :title="pageTitle" :user="user" :universityYear="universityYear">
    <router-view />
  </MainLayout>
</template>

<script>
import MainLayout from './MainLayout.vue'
import axios from 'axios'

export default {
  name: 'App',
  components: { MainLayout },
  data() {
    return {
      pageTitle: 'Jardin Enchanté',
      universityYear: '2024-2025',
      user: null
    }
  },
  async created() {
    try {
      const res = await axios.get('/user/api')
      this.user = res.data
    } catch {
      this.user = null
    }
  }
}
</script>