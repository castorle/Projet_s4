// assets/router/index.js
import { createRouter, createWebHistory } from 'vue-router'
import PlantList from '../vue/PlantList.vue'
import Home from '../vue/Home.vue'

const routes = [
    { path: '/', component: Home },
    { path: '/plants', component: PlantList }
]

export default createRouter({
    history: createWebHistory(),
    routes
})