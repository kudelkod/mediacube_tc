<template>
<div class="departments">
    <b-button size="sm" variant="success" v-on:click="addDepartment" class="mb-2">Добавить</b-button>
    <b-table
        id="departments-table"
        :items="departments"
        :per-page="perPage"
        :current-page="currentPage"
        :fields="fields"
        hover
    >
        <template #cell(actions)="row">
            <b-button size="sm" variant="primary" v-on:click="row.item.edit = true" v-if="!row.item.edit">Редактировать</b-button>
            <b-button size="sm" variant="success" v-on:click="row.item.edit = false" v-if="row.item.edit">Сохранить</b-button>
            <b-button size="sm" variant="danger" v-on:click="test(row.item.department_id)">Удалить</b-button>
        </template>

        <template #cell(name)="row">
            <input type="text" class="form-control" v-model="row.item.name" v-if="row.item.edit">
            <label v-else>{{row.item.name}}</label>
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
    name: "Departments",
    data(){
        return {
            fields:[
                {
                    key: 'name',
                    label: 'Наименование',
                },
                {
                    key: 'max_salary',
                    label: 'Максимальная зарплата',
                },
                {
                    key: 'employers_count',
                    label: 'Кол-во работников',
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
            'departments': 'DepartmentsModule/getDepartments',
            'total': 'DepartmentsModule/getPaginationTotal',
            'perPage': 'DepartmentsModule/getPaginationPerPage',
            'getCurrentPage': 'DepartmentsModule/getPaginationCurrentPage',
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
            'setCurrentPage': 'DepartmentsModule/setPaginationCurrentPage',
        }),
        ...mapActions({
            'fetchDepartments': 'DepartmentsModule/fetchDepartments',
        }),
        addDepartment(){

        },
        test(i){
            console.log(i)
        },
        init(){
            this.fetchDepartments();
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>

</style>
