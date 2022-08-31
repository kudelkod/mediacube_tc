<template>
<div class="departments">
    <router-link :to="{name: 'DepartmentCard', params:{id: 'new'}}">
        <b-button size="sm" variant="success" class="mb-2">Добавить</b-button>
    </router-link>
    <b-table
        id="departments-table"
        :items="departments"
        :per-page="perPage"
        :current-page="currentPage"
        :fields="fields"
        hover
    >
        <template #cell(actions)="row">
            <router-link :to="{name: 'DepartmentCard', params:{id: row.item.department_id}}">
                <b-button size="sm" variant="primary">Редактировать</b-button>
            </router-link>
            <b-button size="sm" variant="danger" v-on:click="deleteDepartment(row.item.department_id)">Удалить</b-button>
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
            'setTableToast': 'DepartmentsModule/setTableToast',
        }),
        ...mapActions({
            'fetchDepartments': 'DepartmentsModule/fetchDepartments',
            'deleteDepartment': 'DepartmentsModule/deleteDepartment'
        }),
        init(){
            this.fetchDepartments();
            this.setTableToast(this.$bvToast);
        }
    },
    mounted() {
        this.init();
    }
}
</script>

<style scoped>

</style>
