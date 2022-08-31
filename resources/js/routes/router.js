import Vue from 'vue';
import VueRouter from 'vue-router';
import Employers from "../components/tabs/Employers";
import Grid from "../components/tabs/Grid";
import Departments from "../components/tabs/Departments";
import Department from "../components/cards/Department";
import Employer from "../components/cards/Employer";

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
        name: 'Departments',
    },
    {
        path:'/grid',
        component:Grid,
        name: 'Grid'
    },
    {
        path: '/departments/card/:id',
        component: Department,
        name:'DepartmentCard',
    },
    {
        path: '/employers/card/:id',
        component: Employer,
        name:'EmployerCard',
    }
]
export const router =  new VueRouter({
    mode: 'history',
    routes
})
