/**
 * 
 * Mendeskripsikan element javascript yang dibutuhkan
 * 
 */

require('./bootstrap');

window.Vue = require('vue');

// Register vendor Components
import './vendor.js'

// Register autoUpdate Components
import './components/autoUpdate.js'

/**
 * 
 * memberitahukan sistem untuk menggunakan Vue Router
 * 
 */

import VueRouter from 'vue-router'
Vue.use(VueRouter)


/**
 * 
 * Meregristrasikan Vue Router
 * 
 */

let routes = [{
        path: '/home',
        components: require('./admin/Dashboard.vue')
    },
    {
        path: '/id-desa',
        components: require('./admin/IdentitasDesa.vue')
    },
    {
        path: '/pengguna',
        components: require('./admin/Users.vue')
    }
]
/**
 * 
 * Meneruskan router untuk dapat ditampilkan ke layout
 * 
 */

const router = new VueRouter({
    mode: 'history', //membuat mode history
    routes //kode singkat untuk 'routes : routes'
})

/**
 * 
 * Membuat Applikasi Vue dan Menghubungkan ke laravel
 * 
 */

const app = new Vue({
    el: '#app',
    router
});
