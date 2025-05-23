<!-- assets/vue/Header.vue -->
<template>
  <header>
    <h1>{{ title }}</h1>
    <nav>
      <ul>
        <li v-for="item in menu" :key="item.label">
          <router-link :to="item.url">{{ item.label }}</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'Header',
  props: {
    title: String,
    menu: Array
  }
}
</script>