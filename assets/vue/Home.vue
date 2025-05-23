<template>
  <div>
    <p>Bonjour, {{ username }} !</p>
  </div>
</template>

<script>
export default {
  name: 'HelloUser',
  props: {
    username: String
  }
}
</script>