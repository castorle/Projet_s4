<template>
  <div class="example-wrapper" v-if="plant">
    <h1>{{ plant.commonName }}</h1>
    <h2>{{ plant.scientificName }}</h2>
    <img
        v-if="plant.image"
        :src="`${plant.image}`"
        :alt="plant.scientificName"
        style="max-width: 300px; max-height: 300px;"
    />
    <p>{{ plant.description }}</p>
    <ul>
      <li>{{ $t('cycle') }} : {{ $t(plant.cycle) }}</li>
      <li>{{ $t('hardiness_zone') }} : {{ plant.hardinessZone }}</li>
      <li>{{ $t('maintenance_difficulty') }} : {{ $t(plant.maintenanceDifficulty) }}</li>
      <li>{{ $t('watering_needs') }} : {{ $t(plant.wateringNeeds) }}</li>
      <li>{{ $t('soil_type') }} : {{ $t(plant.soilType) }}</li>
      <li>{{ $t('flowering_season') }} : {{ $t(plant.floweringSeason) }}</li>
    </ul>
    <router-link to="/plants">&#8592; {{ $t('plants_index') }}</router-link>
  </div>
  <div v-else>
    <p>{{ $t('loading') }}</p>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return { plant: null }
  },
  mounted() {
    const id = this.$route.params.id
    axios.get(`/plant/api/${id}`).then(res => {
      this.plant = res.data
    })
  }
}
</script>