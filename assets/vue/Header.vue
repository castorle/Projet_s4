<template>
  <header>
    <h1>{{ title }}</h1>
    <nav>
      <ul>
        <li><router-link to="/">{{ $t('home') }}</router-link></li>
        <li><router-link to="/plants">{{ $t('plants') }}</router-link></li>
        <li v-if="user"><router-link to="/maintenance-logs">{{ $t('maintenance_log') }}</router-link></li>
        <li v-if="isAdmin"><a href="/user">{{ $t('crud_user') }}</a></li>
        <li v-if="isAdmin"><a href="/plant">{{ $t('crud_plant') }}</a></li>
        <li v-if="isAdmin"><a href="/category">{{ $t('crud_category') }}</a></li>
        <li v-if="isAdmin"><a href="/maintenance/log">{{ $t('crud_maintenance_log') }}</a></li>
        <li class="right" v-if="user"><a href="#" @click.prevent="logout">{{ $t('logout') }}</a></li>
        <li class="right" v-else><router-link to="/login">{{ $t('login') }}</router-link></li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'Header',
  props: {
    title: String,
    user: Object
  },
  computed: {
    isAdmin() {
      return this.user && this.user.roles && this.user.roles.includes('ROLE_ADMIN')
    }
  },
  methods: {
    logout() {
      window.location.href = '/logout'
    }
  }
}
</script>