import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
import DepartmentsModule from "../modules/DepartmentsModule";
import EmployersModule from "../modules/EmployersModule";

let modules = {
    DepartmentsModule,
    EmployersModule,
}

let store = new Vuex.Store({
    modules:modules
})

export default store
