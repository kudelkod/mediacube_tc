require('./bootstrap');
import Vue from 'vue';
import {router} from "./routes/router"
import store from './store/store';
import {BootstrapVue} from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue);

window.Vue = require('vue').default;

Vue.component('main-component', require('./components/MainComponent.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store: store,
});
