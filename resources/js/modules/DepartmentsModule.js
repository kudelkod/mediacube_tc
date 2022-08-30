export default {
    namespaced: true,
    state: {
        pagination:{
            total:0,
            perPage:5,
            currentPage:1,
        },

        departments:[],
    },
    getters:{
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
            axios.get('/api/departments/fetchDepartments')
                .then((response) => {commit('setDepartments', response.data)})
                .catch(error => console.log(error))
        }
    }
}
