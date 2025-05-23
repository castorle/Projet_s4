<!-- assets/vue/MainLayout.vue -->
<template>
  <div>
    <Header :title="title" :menu="menu" />
    <main>
      <slot></slot>
    </main>
    <Footer :universityYear="universityYear" />
  </div>
</template>

<script>
import Header from './Header.vue'
import Footer from './Footer.vue'

export default {
  name: 'MainLayout',
  components: { Header, Footer },
  props: {
    title: String,
    menu: Array,
    universityYear: String
  }
}
</script>