/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import { createApp } from 'vue'
import App from './vue/App.vue'
import router from './router'
import './styles/app.css'
import i18n from './vue/i18n'

const el = document.getElementById('vue-app')

createApp(App)
    .use(router)
    .use(i18n)
    .mount('#vue-app')