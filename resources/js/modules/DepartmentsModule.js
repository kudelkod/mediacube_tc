export default {
    namespaced: true,
    state: {
        toast: null,
        tableToast: null,
        pagination:{
            total:0,
            perPage:5,
            currentPage:1,
        },

        departments:[],
        department:{
            name: null,
        },
        departmentId: null,
    },
    getters:{
        getDepartment(state){
            return state.department;
        },
        getPaginationTotal(state){
            return state.pagination.total;
        },
        getPaginationPerPage(state){
            return state.pagination.perPage;
        },
        getPaginationCurrentPage(state){
            return state.pagination.currentPage;
        },
        getDepartments(state){
            return state.departments;
        },
    },
    mutations:{
        setTableToast(state, value){
            state.tableToast = value;
        },
        setToast(state, value){
            state.toast = value;
        },
        setDepartmentId(state, value){
            state.departmentId = value;
        },
        setDepartment(state, value){
            state.department = value;
        },
        setPaginationCurrentPage(state, value){
            state.pagination.currentPage = value;
        },
        setDepartments(state, value){
            state.departments = value;
            state.pagination.total = value.length;
        },
    },
    actions:{
        fetchDepartments({commit}){
            axios.get('/departmentsApi/departments/fetchDepartments')
                .then((response) => {commit('setDepartments', response.data)})
                .catch(error => console.log(error))
        },
        fetchDepartment({state, commit}){
            axios.get('/departmentsApi/departments/card/fetchDepartment', {
                params:{
                    departmentId: state.departmentId,
                }
            })
                .then((response) => {
                    commit('setDepartment', response.data);
                })
                .catch(error => console.log(error))
        },
        saveDepartment({state}){
            axios.post('/departmentsApi/departments/card/saveDepartment', {
                department_name: state.department.name,
                department_id: state.departmentId,
            })
                .then((response) => {
                    window.location.href = `/departments/card/${response.data}`
                })
                .catch(error => {
                    error.response.data.errors.department_name.forEach((item) => {
                        state.toast.toast(item, {
                            title: 'Ошибка сохранения',
                            autoHideDelay: 5000,
                            variant: 'danger',
                            appendToast: false,
                        })
                    })
                })

        },
        deleteDepartment({dispatch, state}, department_id){
            axios.delete('/departmentsApi/departments/card/deleteDepartment', {
                params:{
                    departmentId: department_id,
                }
            })
                .then((response) => {dispatch('fetchDepartments')})
                .catch(error => {
                    state.tableToast.toast(error.response.data, {
                        title: 'Ошибка удаления',
                        autoHideDelay: 5000,
                        variant: 'danger',
                        appendToast: false,
                    })
                });
        }
    }
}
