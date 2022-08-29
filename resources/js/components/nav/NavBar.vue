<template>
    <div class="row text-center">
        <div class="col-4">
            <router-link to="/grid">
                Сетка
            </router-link>
        </div>
        <div class="col-4">
            <router-link to="/departments">
                Отделы
            </router-link>
        </div>
        <div class="col-4">
            <router-link to="/employers">
                Сотрудники
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "NavBar",

}
</script>

<style scoped>

</style>
