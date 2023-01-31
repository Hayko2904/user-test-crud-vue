<template>
    <Auth
        v-if="!$store.state.authUser"
    />
    <Users v-else />
</template>

<script>
    import Users from './components/Users.vue'
    import Auth from "./components/Auth.vue";

    export default {
        name: "App",

        data() {
            return {
                authUser: ''
            };
        },

        components: {
            Auth,
            Users
        }
    }
</script>

<style scoped>

</style>