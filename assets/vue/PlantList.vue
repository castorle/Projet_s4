<!-- assets/vue/PlantList.vue -->
<template>
  <section>
    <h2>Liste des plantes</h2>
    <ul>
      <li v-for="plant in plants" :key="plant.id">
        <strong>{{ plant.name }}</strong> — {{ plant.species }}
      </li>
    </ul>
  </section>
</template>

<script>
</script>