// assets/router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import PlantList from '../vue/PlantList.vue'
import PlantShow from '../vue/PlantShow.vue'
import Login from '../vue/Login.vue'
import Register from '../vue/Register.vue'

const routes = [
    { path: '/plants', component: PlantList },
    { path: '/plants/:id', component: PlantShow },
    { path: '/login', component: Login },
    { path: '/register', component: Register }
]

export default createRouter({
    history: createWebHistory('/'),
    routes
})
