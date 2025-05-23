<!-- assets/vue/Footer.vue -->
<template>
  <footer>
    <p>{{ universityYear }}</p>
    <slot></slot>
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