<template>
  <router-link
      :to="`/plants/${plant.id}`"
      class="plant-card link"
      style="text-decoration:none;color:inherit;"
  >
    <section class="list-item plant-card">
      <h2>{{ plant.commonName }}</h2>
      <h3>{{ plant.scientificName }}</h3>
      <p>{{ plant.description }}</p>
      <img
          v-if="plant.image"
          :src="plant.image"
          :alt="plant.scientificName"
          style="max-width: 200px; max-height: 200px;"
      />
    </section>
  </router-link>
</template>

<script>
export default {
  name: 'PlantCard',
  props: {
    plant: { type: Object, required: true }
  }
}
</script>