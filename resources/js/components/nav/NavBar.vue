<template>
    <div class="row text-center">
        <div class="col-4">
            <router-link :to="{name: 'Grid'}">
                <div :class="['choice col-12', {'active-choice' : grid}]">
                    Сетка
                </div>
            </router-link>
        </div>
        <div class="col-4">
            <router-link :to="{name: 'Departments'}">
                <div :class="['choice col-12', {'active-choice' : departments}]">
                    Отделы
                </div>
            </router-link>
        </div>
        <div class="col-4">
            <router-link :to="{name: 'Employers'}">
                <div :class="['choice col-12', {'active-choice' : employers}]">
                    Сотрудники
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "NavBar",
    computed:{
        grid(){
            return this.$route.path.split('/')[1] === "grid"
        },
        employers(){
            return this.$route.path.split('/')[1] === "employers"
        },
        departments(){
            return this.$route.path.split('/')[1] === "departments"
        },
    },
}
</script>

<style scoped>
a:link {
    color: #000000;
}
a:visited {
    color: #000000;
}
a:hover {
    color: #000000;

}
a:active {
    color: #000000;
}
.choice{
    color: #A9A9A9;
}
.choice:hover{
    color: #A9A9A9;
    box-shadow: 0px 5px 5px -5px rgba(34, 60, 80, 0.6);
}
.active-choice{
    color: #000000;
    border-bottom: blue solid 2px;
    font-weight: bold;
}
.active-choice:hover{
    color: #000000;
    border-bottom: blue solid 2px;
    box-shadow: 0px 5px 5px -5px rgba(34, 60, 80, 0.6);
    font-weight: bold;
}
</style>
