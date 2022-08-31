<template>
<div class="department">
    <div class="row mt-5">
        <div class="col-4">
            <label>Наименование</label>
            <input type="text" class="form-control" v-model="department.name">
        </div>
        <div class="col-4" v-if="!newDepartment">
            <label>Максимальная зарплата</label>
            <input type="text" class="form-control" v-model="department.max_salary" readonly>
        </div>
        <div class="col-4" v-if="!newDepartment">
            <label>Кол-во сотрудников</label>
            <input type="text" class="form-control" v-model="department.employers_count" readonly>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <b-button variant="success" @click="saveDepartment">Сохранить</b-button>
        </div>
    </div>
</div>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";

export default {
    name: "Department",
    computed:{
        ...mapGetters({
            'department': 'DepartmentsModule/getDepartment',
        }),
        newDepartment(){
            return this.$route.params.id === 'new';
        }
    },
    methods:{
        ...mapMutations({
            'setDepartmentId': 'DepartmentsModule/setDepartmentId',
            'setToast': 'DepartmentsModule/setToast',
            'setDepartment': 'DepartmentsModule/setDepartment',
        }),
        ...mapActions({
            'fetchDepartment': 'DepartmentsModule/fetchDepartment',
            'saveDepartment': 'DepartmentsModule/saveDepartment',
            'deleteDepartment': 'DepartmentsModule/deleteDepartment',
        }),

    },
    mounted() {
        const department = {
            name: null,
        };
        this.setDepartment(department);
        this.setDepartmentId(this.$route.params.id);
        this.setToast(this.$bvToast);
        if (this.$route.params.id !== 'new'){
            this.fetchDepartment();
        }
    }
}
</script>

<style scoped>
label{
    font-weight: bold;
}
</style>
