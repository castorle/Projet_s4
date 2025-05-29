<template>
  <div class="example-wrapper">
    <h1>{{ $t('plants_index') }}</h1>
    <div class="plant-list">
      <PlantCard
          v-for="plant in plants"
          :key="plant.id"
          :plant="plant"
      />
      <p v-if="plants.length === 0">{{ $t('no_plants_found') }}</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import PlantCard from './PlantCard.vue'

export default {
  components: { PlantCard },
  data() {
    return { plants: [] }
  },
  mounted() {
    axios.get('/plant/api').then(res => {
      this.plants = res.data
    })
  }
}
</script>