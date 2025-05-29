<template>
  <div class="container">
    <h1>{{ $t('maintenance_log_index') }}</h1>
    <div class="maintenance-log-item">
      <section
          v-for="log in maintenanceLogs"
          :key="log.id"
          class="list-item"
      >
        <h2>{{ log.plant.commonName }}</h2>
        <h3>{{ log.plant.scientificName }}</h3>
        <div class="maintenance-details">
          <ul class="maintenance-details-list">
            <li>{{ $t('date') }}: {{ formatDate(log.date) }}</li>
            <li>{{ $t('description') }}: {{ log.description }}</li>
          </ul>
          <img
              v-if="log.plant.image"
              :src="`${log.plant.image}`"
              :alt="log.plant.scientificName"
              style="max-width: 200px; max-height: 200px;"
          />
        </div>
      </section>
      <p v-if="maintenanceLogs.length === 0">{{ $t('no_records_found') }}</p>
    </div>
    <div v-if="user && user.roles && user.roles.includes('ROLE_USER')" class="actions">
      <router-link to="/maintenance-logs/new" class="btn">
        {{ $t('create_new_maintenance_log') }}
      </router-link>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'UserMaintenanceLogs',
  data() {
    return {
      maintenanceLogs: [],
      user: null
    }
  },
  async mounted() {
    // Récupère l'utilisateur courant
    const userRes = await axios.get('/user/api')
    this.user = userRes.data
    // Charge les journaux de maintenance de l'utilisateur
    const res = await axios.get('/user/api/maintenance-logs')
    this.maintenanceLogs = res.data
  },
  methods: {
    formatDate(dateStr) {
      return new Date(dateStr).toLocaleDateString()
    }
  }
}
</script>