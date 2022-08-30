import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
import DepartmentsModule from "../modules/DepartmentsModule";
let modules = {
    DepartmentsModule,
}

let store = new Vuex.Store({
    modules:modules
})

export default store
