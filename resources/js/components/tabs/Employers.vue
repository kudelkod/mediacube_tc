<template>
    <div class="employers">
        <router-link :to="{name: 'EmployerCard', params:{id: 'new'}}">
            <b-button size="sm" variant="success" class="mb-2">Добавить</b-button>
        </router-link>
        <b-table
            id="departments-table"
            :items="employers"
            :per-page="perPage"
            :current-page="currentPage"
            :fields="fields"
            hover
        >
            <template #cell(actions)="row">
                <router-link :to="{name: 'EmployerCard', params:{id: row.item.employer_id}}">
                    <b-button size="sm" variant="primary">Редактировать</b-button>
                </router-link>
                <b-button size="sm" variant="danger" v-on:click="deleteEmployer(row.item.employer_id)">Удалить</b-button>
            </template>

            <template #cell(employer_departments)="row">
                <label v-for="department in row.item.employer_departments">{{department.name+", " }}</label>
            </template>

            <template #cell(sex)="row">
                <label>{{row.item.sex === 'male' ? 'Мужской' : (row.item.sex === 'female' ? 'Женский' : "-")}}</label>
            </template>

        </b-table>
        <b-pagination
            v-model="currentPage"
            :total-rows="total"
            :per-page="perPage"
            aria-controls="departments-table"
        ></b-pagination>
    </div>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";

export default {
    name: "Employers",
    data(){
        return {
            fields:[
                {
                    key: 'name',
                    label: 'Имя',
                },
                {
                    key: 'surname',
                    label: 'Фамилия',
                },
                {
                    key: 'patronymic',
                    label: 'Отчество',
                },
                {
                    key: 'sex',
                    label: 'Пол',
                },
                {
                    key: 'salary',
                    label: 'Зарплата',
                },
                {
                    key: 'employer_departments',
                    label: 'Отделы',
                },
                {
                    key: 'actions',
                    label: 'Действия',
                }
            ]
        }
    },
    computed:{
        ...mapGetters({
            'employers': 'EmployersModule/getEmployers',
            'total': 'EmployersModule/getPaginationTotal',
            'perPage': 'EmployersModule/getPaginationPerPage',
            'getCurrentPage': 'EmployersModule/getPaginationCurrentPage',
        }),
        currentPage:{
            get(){
                return this.getCurrentPage;
            },
            set(value){
                this.setCurrentPage(value);
            }
        }
    },
    methods:{
        ...mapMutations({
            'setCurrentPage': 'EmployersModule/setPaginationCurrentPage',
        }),
        ...mapActions({
            'fetchEmployers': 'EmployersModule/fetchEmployers',
            'deleteEmployer': 'EmployersModule/deleteEmployer',
        }),
        init(){
            this.fetchEmployers();
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>

</style>
