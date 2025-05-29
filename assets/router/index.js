// assets/router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import PlantList from '../vue/PlantList.vue'
import Home from '../vue/Home.vue'
import PlantShow from '../vue/PlantShow.vue'
import UserMaintenanceLogs from "../vue/UserMaintenanceLogs.vue";
import Login from '../vue/Login.vue'
import Register from '../vue/Register.vue'

const routes = [
    { path: '/', component: Home },
    { path: '/plants', component: PlantList },
    { path: '/plants/:id', component: PlantShow },
    {path: '/maintenance-logs', component: UserMaintenanceLogs},
    { path: '/login', component: Login },
    { path: '/register', component: Register }
]

export default createRouter({
    history: createWebHistory('/app'),
    routes
})
