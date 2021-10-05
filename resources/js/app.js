require('./bootstrap');

import vue from 'vue';

window.Vue = vue;

// Importamos el componente principal
import App from './components/App.vue'

// Importando Axios
import VueAxios from 'vue-axios'
import axios from 'axios'

// Importando VueRoute
import VueRouter from 'vue-router'
import { routes } from './routes'
import Vue from 'vue'
Vue.use(VueRouter)
Vue.use(VueAxios, axios)

const router = new VueRouter({
    mode: 'history',
    routes: routes
})

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
})