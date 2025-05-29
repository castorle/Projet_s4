<!-- assets/vue/Footer.vue -->
<template>
  <footer>
    <p>{{ universityYear }}</p>
    <slot></slot>
    <select v-model="$i18n.locale">
      <option value="fr">Français</option>
      <option value="en">English</option>
      <option value="es">Español</option>
      <option value="de">Deutsch</option>
      <option value="it">Italiano</option>
    </select>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  props: {
    universityYear: String
  }
}
</script>