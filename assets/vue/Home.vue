<template>
  <div>
    <p v-if="displayUsername">Bonjour, {{ displayUsername }} !</p>
    <p v-else>Bonjour, visiteur !</p>
  </div>
</template>

<script>
export default {
  name: 'HelloUser',
  inject: ['user'],
  computed: {
    displayUsername() {
      const user = this.user()
      return user && user.username ? user.username : ''
    }
  }
}
</script>