import Vue from 'vue';
import VueRouter from 'vue-router';
import Employers from "../components/tabs/Employers";
import Grid from "../components/tabs/Grid";
import Departments from "../components/tabs/Departments";
import MainComponent from "../components/MainComponent";

Vue.use(VueRouter);
const routes = [
    {
        path:'/employers',
        component:Employers,
        name: 'Employers'
    },
    {
        path:'/departments',
        component:Departments,
        name: 'Departments'
    },
    {
        path:'/grid',
        component:Grid,
        name: 'Grid'
    },
]
export const router =  new VueRouter({
    mode: 'history',
    routes
})
