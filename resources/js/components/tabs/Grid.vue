<template>
    <div class="grid">
        <table border="1">
            <tr>
                <td></td>
                <td v-for="department in departments" style="font-weight: bold">{{department.name}}</td>
            </tr>
            <tr v-for="employer in employers">
                <td style="font-weight: bold">{{employer.name}} {{employer.surname}} {{employer.patronymic}}</td>
                <td v-for="department in departments">
                    <label v-for="dep in employer.employer_departments">
                        <span v-if="dep.department_id === department.department_id" style="font-weight: bold; font-size: 30px">&#10003;</span>
                    </label>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Grid",
    computed:{
        ...mapGetters({
            'departments': 'DepartmentsModule/getDepartments',
            'employers': 'EmployersModule/getEmployers',
        }),
    },
    methods:{
        ...mapActions({
            'fetchDepartments': 'DepartmentsModule/fetchDepartments',
            'fetchEmployers': 'EmployersModule/fetchEmployers',
        }),
        init(){
            this.fetchDepartments();
            this.fetchEmployers();
        },
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>
td{
    text-align: center;
}
</style>
