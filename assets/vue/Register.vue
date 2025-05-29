<template>
  <div class="register-wrapper">
    <form @submit.prevent="submit">
      <div v-if="error" class="alert alert-danger">{{ error }}</div>
      <div v-if="success" class="alert alert-success">Inscription réussie !</div>
      <label>{{ $t('username') }}</label>
      <input v-model="username" type="text" required />
      <label>Email</label>
      <input v-model="email" type="email" required />
      <label>Mot de passe</label>
      <input v-model="plainPassword" type="password" required />
      <button type="submit">{{ $t('Register') }}</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Register',
  data() {
    return {
      username: '',
      email: '',
      plainPassword: '',
      error: null,
      success: false
    }
  },
  methods: {
    async submit() {
      this.error = null
      this.success = false
      try {
        await axios.post('/api/register', {
          username: this.username,
          email: this.email,
          plainPassword: this.plainPassword
        })
        this.success = true
        this.$router.push('/login') // Redirection vers la page de connexion
      } catch (e) {
        this.error = e.response?.data?.error || 'Erreur lors de l’inscription'
      }
    }
  }
}
</script>