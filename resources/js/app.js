require('./bootstrap');

import router from "./router";

import './assets/css/uikit.min.css'
import './assets/css/uikit-rtl.min.css'
import './assets/js/uikit.min.js'
import './assets/js/uikit-icons.min.js'

let Vue = require("vue").default;

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('v-header', require('./components/Header').default)
Vue.component('v-post', require('./components/Post').default)

const app = new Vue({
    el: '#app',
    router
});
