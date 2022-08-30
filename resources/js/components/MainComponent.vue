<template>
    <div class="container mt-2">
        <NavBar/>
        <div class="content mt-5">
            <router-view></router-view>
        </div>
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
