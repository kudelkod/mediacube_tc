<template>
    <div class="container mt-2">
        <NavBar/>
        <router-view></router-view>
    </div>
</template>

<script>
    import NavBar from "./nav/NavBar";
    export default {
        components: {NavBar},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
