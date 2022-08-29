import Vue from 'vue';
import VueRouter from 'vue-router';
import Employers from "../components/tabs/Employers";
import Grid from "../components/tabs/Grid";
import Departments from "../components/tabs/Departments";

Vue.use(VueRouter);
const routes = [
    {
        path:'/employers',
        component:Employers
    },
    {
        path:'/departments',
        component:Departments
    },
    {
        path:'/grid',
        component:Grid
    },
]
export const router =  new VueRouter({
    mode: 'history',
    routes
})
