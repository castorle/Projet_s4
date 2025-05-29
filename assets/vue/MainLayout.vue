<template>
  <div id="app">
    <Header :title="title" :user="user" />
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
    user: Object,
    universityYear: String
  },
  provide() {
    return {
      user: () => this.user
    }
  }
}
</script>