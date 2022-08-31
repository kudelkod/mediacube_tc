<template>
    <div class="employer">
        <div class="row mt-5">
            <div class="col-4">
                <label>Имя</label>
                <input type="text" class="form-control" v-model="employer.name">
            </div>
            <div class="col-4">
                <label>Фамилия</label>
                <input type="text" class="form-control" v-model="employer.surname">
            </div>
            <div class="col-4">
                <label>Отчество</label>
                <input type="text" class="form-control" v-model="employer.patronymic">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-4">
                <label>Пол</label>
                <select class="form-control" v-model="employer.sex">
                    <option :value="null"></option>
                    <option :value="'male'">Мужской</option>
                    <option :value="'female'">Женский</option>
                </select>
            </div>
            <div class="col-4">
                <label>Зарплата</label>
                <input type="number" class="form-control" step="0,01" v-model="employer.salary">
            </div>
            <div class="col-4">
                <label>Отделы</label>
                <select class="form-control" multiple v-model="employer.employer_departments">
                    <option v-for="department in departments" :value="department.department_id">{{department.name}}</option>
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <b-button variant="success" @click="saveEmployer">Сохранить</b-button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";

export default {
    name: "Employer",
    computed:{
        ...mapGetters({
            'departments': 'DepartmentsModule/getDepartments',
            'employer': 'EmployersModule/getEmployer',
        }),
    },
    methods:{
        ...mapMutations({
            'setEmployerId': 'EmployersModule/setEmployerId',
            'setToast': 'EmployersModule/setToast',
            'setEmployer': 'EmployersModule/setEmployer',
        }),
        ...mapActions({
            'fetchEmployer': 'EmployersModule/fetchEmployer',
            'fetchDepartments': 'DepartmentsModule/fetchDepartments',
            'saveEmployer': 'EmployersModule/saveEmployer',
        }),
        init(){
            const employer ={
                name: null,
                surname: null,
                patronymic: null,
                sex:null,
                salary:null,
                employer_departments:[],
            };
            this.setEmployer(employer);
            this.setEmployerId(this.$route.params.id);
            this.setToast(this.$bvToast);
            this.fetchDepartments();
            if (this.$route.params.id !== 'new'){
                this.fetchEmployer();
            }
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>
label{
    font-weight: bold;
}
</style>
