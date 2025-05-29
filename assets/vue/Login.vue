<template>
  <div class="login-wrapper">
    <form @submit.prevent="submit">
      <div v-if="error" class="alert alert-danger">{{ error }}</div>
      <label>{{ $t('email') }}</label>
      <input v-model="email" type="email" required autocomplete="email" />
      <label>{{ $t('password') }}</label>
      <input v-model="password" type="password" required autocomplete="current-password" />
      <button type="submit">{{ $t('sign_in') }}</button>
    </form>
    <router-link to="/register" class="btn btn-link" style="margin-top:1em;">
      {{ $t('Register') }}
    </router-link>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: '',
      error: null
    }
  },
  methods: {
    async submit() {
      this.error = null
      try {
        const res = await axios.post('/api/login', {
          email: this.email,
          password: this.password,
          _csrf_token: '' // à récupérer si besoin
        })
        // Redirige ou recharge l'utilisateur
        window.location.href = '/app'
      } catch (e) {
        this.error = e.response?.data?.error || 'Erreur de connexion'
      }
    }
  }
}
</script>