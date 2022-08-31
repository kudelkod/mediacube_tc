export default {
    namespaced: true,
    state: {
        toast: null,
        pagination:{
            total:0,
            perPage:5,
            currentPage:1,
        },

        employers:[],
        employer:{
            name: null,
            surname: null,
            patronymic: null,
            sex:null,
            salary:null,
            employer_departments:[],
        },
        employerId: null,
    },
    getters:{
        getEmployer(state){
            return state.employer;
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
        getEmployers(state){
            return state.employers;
        },
    },
    mutations:{
        setToast(state, value){
            state.toast = value;
        },
        setEmployerId(state, value){
            state.employerId = value;
        },
        setEmployer(state, value){
            state.employer = value;
        },
        setPaginationCurrentPage(state, value){
            state.pagination.currentPage = value;
        },
        setEmployers(state, value){
            state.employers = value;
            state.pagination.total = value.length;
        },
    },
    actions:{
        fetchEmployers({commit}){
            axios.get('/employersApi/employers/fetchEmployers')
                .then((response) => {commit('setEmployers', response.data)})
                .catch(error => console.log(error))
        },
        fetchEmployer({state, commit}){
            axios.get('/employersApi/employers/card/fetchEmployer', {
                params:{
                    employerId: state.employerId,
                }
            })
                .then((response) => {
                    commit('setEmployer', response.data);
                })
                .catch(error => console.log(error))
        },
        saveEmployer({state}){
            axios.post('/employersApi/employers/card/saveEmployer', {
                employerId: state.employerId,
                name: state.employer.name,
                surname: state.employer.surname,
                patronymic: state.employer.patronymic,
                sex:state.employer.sex,
                salary:state.employer.salary,
                employer_departments: state.employer.employer_departments,
            })
                .then((response) => {
                    window.location.href = `/employers/card/${response.data}`
                })
                .catch(error => {
                    error.response.data.errors.name.forEach((item) => {
                        state.toast.toast(item, {
                            title: 'Ошибка сохранения',
                            autoHideDelay: 5000,
                            variant: 'danger',
                            appendToast: false,
                        })
                    })

                    error.response.data.errors.surname.forEach((item) => {
                        state.toast.toast(item, {
                            title: 'Ошибка сохранения',
                            autoHideDelay: 5000,
                            variant: 'danger',
                            appendToast: false,
                        })
                    })

                    error.response.data.errors.employer_departments.forEach((item) => {
                        state.toast.toast(item, {
                            title: 'Ошибка сохранения',
                            autoHideDelay: 5000,
                            variant: 'danger',
                            appendToast: false,
                        })
                    })
                })
        },
        deleteEmployer({dispatch}, employer_id){
            axios.delete('/employersApi/employers/card/deleteEmployer', {
                params:{
                    employerId: employer_id,
                }
            })
                .then((response) => {dispatch('fetchEmployers')})
                .catch(error => console.log(error));
        }
     }
}
